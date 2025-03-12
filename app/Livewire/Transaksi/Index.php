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
        return view('livewire.transaksi.index')->extends('layouts.app', ['header' => 'Transaksi ', 'title' => 'Transaksi '])->section('content');
    }
    public function addTransaksi()
    {
        $Transaksi =  Transaksi::create(
            [
                'quantity' => $this->quantity,
                'user_id' => Auth::user()->id,
            ]
        );
        $this->code = $Transaksi->id;
        return redirect()->route('transaksi.detail', ['id' => $Transaksi->id]);
    }
}
