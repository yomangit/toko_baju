<?php

namespace App\Livewire\Administrator\Kategori;

use App\Models\Kategori;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Create extends Component
{
    public $modal;
    #[Validate('required', message: 'kolom kategori pakaian tidak boleh kosong!!!')]
    public $kategori_pakaian;
    #[On('tambah-kategori')]
    public function tambahKategori()
    {
       $this->modal="modal-open";
    }
    public function render()
    {
        return view('livewire.administrator.kategori.create');
    }
    public function store()
    {
        $this->validate();
        Kategori::create([
            'kategori_pakaian' => $this->kategori_pakaian,
        ]);
        $this->dispatch(
            'alert',
            [
                'text' => "Kategori telah ditambahkan!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
            ]
        );
        $this->reset('kategori_pakaian');
        $this->dispatch('updateKateogriPakaian');
    }
    public function closeModal()
    {
      $this->reset('modal');
    }
}
