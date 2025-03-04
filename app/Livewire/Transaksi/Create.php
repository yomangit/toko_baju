<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.transaksi.create')->extends('layouts.app', ['header' => 'Transaksi Baru', 'title' => 'Transaksi Baru'])->section('content');
    }
}
