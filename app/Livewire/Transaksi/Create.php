<?php

namespace App\Livewire\Transaksi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\StokPakaian;
use App\Models\TransaksiDetail;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cjmellor\Approval\Models\Approval;

class Create extends Component
{
    public $harga_satuan, $stok, $nama_pakaian, $product_id;
    public $count = 1, $total_harga, $total_price, $price, $quantity, $search = '';
    public $transaksi_id;
    use WithPagination;
    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
    public function render()
    {
        $transaksi = Transaksi::exists();
        if ($transaksi) {
            $this->transaksi_id = Transaksi::latest()->first()->id + 1;
        } else {
            $this->transaksi_id = 1;
        }
        $source = TransaksiDetail::where('transaksi_id', $this->transaksi_id)->paginate(10);
        $this->total_price = TransaksiDetail::where('transaksi_id', $this->transaksi_id)->sum('price');
        if (StokPakaian::search(trim($this->search))->exists()) {
            if ($this->search) {
                $stok = StokPakaian::search(trim($this->search))->first();
                $this->product_id = $stok->id;
                $this->harga_satuan = $stok->harga_jual;
                $this->nama_pakaian = $stok->nama_pakaian;
                $this->stok = $stok->jumlah_stok;
                $this->total_harga = $this->count * $this->harga_satuan;
            } else {
                $this->harga_satuan = 0;
                $this->nama_pakaian = '';
                $this->stok = 0;
                $this->total_harga = 0;
            }
        }
        return view('livewire.transaksi.create', [
            'source' => $source,

        ])->extends('layouts.app', ['header' => 'Transaksi Baru', 'title' => 'Transaksi Baru'])->section('content');
    }
    public function generateUniqueCode()
    {
        $code = 'current_id_transaction-' . random_int(100000, 999999);
        return $code;
    }

    public function store()
    {
        $Transaksi = new Transaksi();
        $Transaksi->total_price = $this->total_price;
        $Transaksi->transaction_date = Carbon::now()->format('d-m-Y');
        $Transaksi->quantity = $this->quantity;
        $Transaksi->user_id = Auth::user()->id;
        $Transaksi->save();
        DB::beginTransaction();
        if ($this->stok < $this->count) {
            $this->dispatch(
                'alert',
                [
                    'text' => 'Stok tidak mencukupi untuk transaksi ini.',
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #ff3333, #ff6666)",
                ]
            );
            return;
        } else {

            try {

                // Assuming you have a Transaksi model to save the transaction
                $TransaksiDetail = new TransaksiDetail();
                $TransaksiDetail->transaksi_id = $this->transaksi_id;
                $TransaksiDetail->product_id = $this->product_id;
                $TransaksiDetail->quantity = $this->count;
                $TransaksiDetail->price = $this->total_harga;
                $TransaksiDetail->save();
                // Save the transaction


                // Update the stock
                $stok = StokPakaian::whereId($this->product_id)->first();
                $stok->jumlah_stok -= $this->count;
                $stok->save();
                DB::commit();
                $this->dispatch(
                    'alert',
                    [
                        'text' => "Transaksi berhasil disimpan!!",
                        'duration' => 3000,
                        'destination' => '/contact',
                        'newWindow' => true,
                        'close' => true,
                        'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                    ]
                );
            } catch (\Exception $e) {
                DB::rollBack();
                $this->dispatch(
                    'alert',
                    [
                        'text' => 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage(),
                        'duration' => 3000,
                        'destination' => '/contact',
                        'newWindow' => true,
                        'close' => true,
                        'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                    ]
                );
            }
        }
    }

    public function destroy($id)
    {
        $approve =   TransaksiDetail::where('product_id', 'like', $id)->first();
        $jumlah = $approve->quantity;
        $id_stok = $approve->product_id;
        $stok = StokPakaian::whereId($id_stok)->first();
        if ($stok) {
            $stok->jumlah_stok += $jumlah;
            $stok->save();
        }
        $approve->delete();
        $this->dispatch(
            'alert',
            [
                'text' => "Kostumer deleted!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #ff3333, #ff6666)",
            ]
        );
    }
}
