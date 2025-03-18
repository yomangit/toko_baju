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
            'transaksi' => Transaksi::with(['kasir', 'customer', 'transaksi_details'])->get()
        ])->extends('layouts.app', ['header' => 'Transaksi ', 'title' => 'Transaksi '])->section('content');
    }
    public function goDetailTransaksi($id)
    {
        return redirect()->route('transaksi.detail', ['id' => $id]);
    }
}
