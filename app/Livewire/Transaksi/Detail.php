<?php

namespace App\Livewire\Transaksi;

use App\Models\TransaksiDetail;
use Livewire\Component;

class Detail extends Component
{
    public $transaksi_id;
    public function mount($id)
    {
        $this->transaksi_id = $id;
    }
    public function render()
    {
        return view('livewire.transaksi.detail', [
            'TransaksiDetail' => TransaksiDetail::with(['stokPakaian'])->where('transaksi_id', $this->transaksi_id)->get()
        ])->extends('layouts.app', ['header' => 'Detail Transaksi', 'title' => 'Detail Transaksi'])->section('content');
    }
}
