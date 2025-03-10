<?php

namespace App\Livewire\Transaksi;

use App\Models\StokPakaian;
use Livewire\Component;

class Create extends Component
{
    public $harga_satuan, $stok, $nama_pakaian;
    public $count = 0, $total, $search = '';

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
        if ($this->search) {
            $stok = StokPakaian::search(trim($this->search))->first();
            $this->harga_satuan = $stok->harga_jual;
            $this->nama_pakaian = $stok->nama_pakaian;
            $this->stok = $stok->jumlah_stok;
            $this->total = $this->count * $this->harga_satuan;
        }
        return view('livewire.transaksi.create')->extends('layouts.app', ['header' => 'Transaksi Baru', 'title' => 'Transaksi Baru'])->section('content');
    }
}
