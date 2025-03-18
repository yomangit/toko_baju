<?php

namespace App\Livewire\Transaksi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\StokPakaian;
use Livewire\WithPagination;
use App\Models\TransaksiDetail;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cjmellor\Approval\Models\Approval;

class Create extends Component
{
    public $harga_satuan, $stok_satuan, $stok, $nama_pakaian, $product_id;
    public $count = 1, $total_harga, $total_price, $total_pembayaran, $cashback, $cashback_rp, $price, $quantity, $search = '';
    public $transaksi_id, $Pakaian;
    public $payment;
    #[Validate('required', message: 'kolom pembayaran harus di isi!!!')]
    public $payment_rp;
    use WithPagination;
    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
    public function mount()
    {
        $transaksi = Transaksi::exists();
        if ($transaksi) {

            $this->transaksi_id = Transaksi::latest()->first()->id + 1;
        }
    }
    public function render()
    {

        $source = Approval::where('new_data->transaksi_id', 'Like', $this->transaksi_id)->get();
        $this->quantity = Approval::where('new_data->transaksi_id', 'Like', $this->transaksi_id)->sum('new_data->quantity');
        $this->Pakaian = StokPakaian::get();
        if ($this->search) {
            if (StokPakaian::search(trim($this->search))->exists()) {
                $stok = StokPakaian::search(trim($this->search))->first();
                $this->product_id = $stok->id;
                $this->harga_satuan = 'Rp. ' . number_format($stok->harga_jual, 0, ',', '.');
                $this->nama_pakaian = $stok->nama_pakaian;
                $this->stok = $stok->jumlah_stok;
                $this->total_harga = $this->count * $stok->harga_jual;
                $this->stok_satuan = $stok->harga_jual;
            } else {
                $this->harga_satuan = 0;
                $this->nama_pakaian = '';
                $this->stok = 0;
                $this->total_harga = 0;
                $this->stok_satuan = 0;
            }
        } else {
            $this->harga_satuan = 0;
            $this->nama_pakaian = '';
            $this->stok = 0;
            $this->total_harga = 0;
        }
        $products = StokPakaian::where('kode_pakaian', 'like', '%' . $this->search . '%')->get();
        return view('livewire.transaksi.create', [
            'source' => $source,
            'products' => $products,

        ])->extends('layouts.app', ['header' => 'Transaksi Baru', 'title' => 'Transaksi Baru'])->section('content');
    }
    public function setKodePakaian($kode_pakaian)
    {
        $this->search = $kode_pakaian;
    }
    public function updatedCount()
    {
        $this->total_harga = $this->count *  $this->stok_satuan;
    }
    public function updatedPayment()
    {
        $total_price = Approval::where('new_data->transaksi_id', 'Like', $this->transaksi_id)->sum('new_data->price');
        $this->total_pembayaran = $total_price;
        $this->total_price = 'Rp. ' . number_format($total_price, 0, ',', '.');
        if ($this->payment) {
            $kembali = $this->payment - $total_price;
            if ($kembali <= 0) {
                $this->cashback = 0;
            } else {
                $this->cashback_rp = 'Rp. ' . number_format($kembali, 0, ',', '.');
                $this->cashback =  $kembali;
            }
        }
    }

    public function updatedSearch()
    {
        $this->resetPage();
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
                $transaksi = Transaksi::exists();
                if (!$transaksi) {
                    $trans_id =   Transaksi::updateOrcreate(
                        ['id' => $this->transaksi_id],
                        [
                            'quantity' => 0,
                            'user_id' => Auth::user()->id,
                            'total_price' => 0,
                            'payment' => 0,
                            'cashback' => 0,
                            'transaction_date' => Carbon::now()->format('Y-m-d'),
                        ]
                    );
                    $this->transaksi_id = $trans_id->id;
                }
                // Assuming you have a Transaksi model to save the transaction
                TransaksiDetail::create([
                    'transaksi_id' => $this->transaksi_id,
                    'product_id' => $this->product_id,
                    'quantity' => $this->count,
                    'price' => $this->total_harga,
                    'transaction_date' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                // Save the transaction
                // Update the stock
                $stok = StokPakaian::whereId($this->product_id)->first();
                $stok->jumlah_stok -= $this->count;
                $stok->save();
                DB::commit();
                $this->dispatch(
                    'alert',
                    [
                        'text' => "Pakaian di masukan dalam keranjang!!",
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
    public function selesai()
    {
        $this->validate();
        $source = Approval::whereIn('new_data->transaksi_id', [$this->transaksi_id])->exists();

        if ($source) {
            if (($this->payment >  $this->total_pembayaran) || ($this->payment == $this->total_pembayaran)) {
                $trans =  Transaksi::updateOrcreate(
                    ['id' => $this->transaksi_id],
                    [
                        'quantity' =>  $this->quantity,
                        'user_id' => Auth::user()->id,
                        'total_price' => $this->total_pembayaran,
                        'payment' => $this->payment,
                        'cashback' => $this->cashback,
                        'transaction_date' => Carbon::now()->format('Y-m-d'),
                    ]
                );
                $source = Approval::whereIn('new_data->transaksi_id', [$trans->id])->get();
                foreach ($source as  $value) {
                    Approval::find($value->id)->approve();
                }
                $this->dispatch(
                    'alert',
                    [
                        'text' => "Transaksi Selesai!!",
                        'duration' => 3000,
                        'destination' => '/contact',
                        'newWindow' => true,
                        'close' => true,
                        'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                    ]
                );
                Approval::whereIn('new_data->transaksi_id', [$trans->id])->where('state', 'like', 'approved')->delete();
            } else {
                $this->dispatch(
                    'alert',
                    [
                        'text' => "Pembayaran Kurang!!",
                        'duration' => 3000,
                        'destination' => '/contact',
                        'newWindow' => true,
                        'close' => true,
                        'backgroundColor' => "linear-gradient(to right, #ff3333, #ff6666)",
                    ]
                );
            }
        } else {
            $this->dispatch(
                'alert',
                [
                    'text' => "Tidak ada belanjaan!!",
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #ff3333, #ff6666)",
                ]
            );
        }
    }

    public function destroy($id)
    {
        $approve =   Approval::whereId($id)->first();
        $jumlah = $approve->new_data['quantity'];
        $id_stok = $approve->new_data['product_id'];
        $stok = StokPakaian::whereId($id_stok)->first();
        if ($stok) {
            $stok->jumlah_stok += $jumlah;
            $stok->save();
        }
        $approve->delete();
        $this->dispatch(
            'alert',
            [
                'text' => "Belanjaan di hapus!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #ff3333, #ff6666)",
            ]
        );
    }
}
