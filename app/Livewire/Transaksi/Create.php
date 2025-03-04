<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;

class Create extends Component
{
    public $harga_satuan = 30;
    public $count = 0, $total;

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
        $this->total = $this->count * $this->harga_satuan;
        return view('livewire.transaksi.create')->extends('layouts.app', ['header' => 'Transaksi Baru', 'title' => 'Transaksi Baru'])->section('content');
    }
}
