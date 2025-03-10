<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\StokPakaian;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cjmellor\Approval\Models\Approval;

class Create extends Component
{
    public $harga_satuan, $stok, $nama_pakaian, $idPakaian;
    public $count = 1, $total_harga, $search = '';
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
        $a = $this->generateUniqueCode();
        $source = Approval::paginate(10);
        if (StokPakaian::search(trim($this->search))->exists()) {
            if ($this->search) {
                $stok = StokPakaian::search(trim($this->search))->first();
                $this->idPakaian = $stok->id;
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
                $transaksi = new Transaksi();
                $transaksi->nama_pakaian = $this->nama_pakaian;
                $transaksi->harga_satuan = $this->harga_satuan;
                $transaksi->jumlah = $this->count;
                $transaksi->total_harga = $this->total_harga;
                $transaksi->id_pakaian = $this->idPakaian;
                $transaksi->user_id = Auth::user()->id;
                $transaksi->save();

                // Update the stock
                $stok = StokPakaian::whereId($this->idPakaian)->first();
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
        Approval::where('new_data->id_pakaian', 'like', $this->reference)->first();
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
