<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.transaksi.index')->extends('layouts.app', ['header' => 'Transaksi ', 'title' => 'Transaksi '])->section('content');
    }
}
