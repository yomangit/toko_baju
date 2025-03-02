<?php

namespace App\Livewire\Administrator\Warna;

use App\Models\Warna;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Create extends Component
{
    public $modal;
    #[Validate('required', message: 'kolom warna tidak boleh kosong!!!')]
    public $nama_warna;
    #[On('tambah-warna')]
    public function tambahWarna()
    {
       $this->modal="modal-open";
    }
    public function render()
    {
        return view('livewire.administrator.warna.create');
    }
    public function store()
    {
        $this->validate();
        Warna::create([
            'nama_warna' => $this->nama_warna,
        ]);
        $this->dispatch(
            'alert',
            [
                'text' => "warna Pakaian telah ditambahkan!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
            ]
        );
        $this->dispatch('updateWarnaPakaian');
        $this->reset('nama_warna');
    }
    public function closeModal()
    {
      $this->reset('modal');
    }
}
