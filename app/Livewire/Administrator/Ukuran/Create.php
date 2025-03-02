<?php

namespace App\Livewire\Administrator\Ukuran;

use App\Models\UkuranPakaian;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Create extends Component
{
    public $modal;
    #[Validate('required', message: 'kolom ukuran tidak boleh kosong!!!')]
    public $ukuran;
    #[On('tambah-ukuran')]
    public function tambahUkuran()
    {
       $this->modal="modal-open";
    }
    public function render()
    {
        return view('livewire.administrator.ukuran.create');
    }
    public function store()
    {
        $this->validate();
        UkuranPakaian::create([
            'ukuran_pakaian' => $this->ukuran,
        ]);
        $this->dispatch(
            'alert',
            [
                'text' => "Size Pakaian telah ditambahkan!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
            ]
        );
        $this->dispatch('updateUkuranPakaian');
        $this->reset('ukuran');
    }
    public function closeModal()
    {
      $this->reset('modal');
    }
}
