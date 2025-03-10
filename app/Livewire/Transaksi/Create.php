<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\StokPakaian;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $harga_satuan, $stok, $nama_pakaian;
    public $count = 1, $total, $search = '';

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
        dd($a);
        if (StokPakaian::search(trim($this->search))->exists()) {
            if ($this->search) {
                $stok = StokPakaian::search(trim($this->search))->first();
                $this->harga_satuan = $stok->harga_jual;
                $this->nama_pakaian = $stok->nama_pakaian;
                $this->stok = $stok->jumlah_stok;
                $this->total = $this->count * $this->harga_satuan;
            } else {
                $this->harga_satuan = 0;
                $this->nama_pakaian = '';
                $this->stok = 0;
                $this->total = 0;
            }
        }
        return view('livewire.transaksi.create')->extends('layouts.app', ['header' => 'Transaksi Baru', 'title' => 'Transaksi Baru'])->section('content');
    }

    public function generateUniqueCode()
    {
        $code = random_int(100000, 999999);
        return $code;
    }

    public function store()
    {
        DB::beginTransaction();

        try {
            // Assuming you have a Transaksi model to save the transaction
            $transaksi = new Transaksi();
            $transaksi->nama_pakaian = $this->nama_pakaian;
            $transaksi->harga_satuan = $this->harga_satuan;
            $transaksi->jumlah = $this->count;
            $transaksi->total = $this->total;
            $transaksi->save();

            // Update the stock
            $stok = StokPakaian::where('nama_pakaian', $this->nama_pakaian)->first();
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
