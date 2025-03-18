<?php

namespace App\Livewire\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $code;
    public function render()
    {
        return view('livewire.transaksi.index', [
            'transaksi' => Transaksi::get()
        ])->extends('layouts.app', ['header' => 'Transaksi ', 'title' => 'Transaksi '])->section('content');
    }
}
