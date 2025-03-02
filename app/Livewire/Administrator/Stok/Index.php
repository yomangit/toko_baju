<?php

namespace App\Livewire\Administrator\Stok;


use Livewire\Component;
use App\Models\StokPakaian;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    #[On('updateStok')]
    public function render()
    {

        return view('livewire.administrator.stok.index',[
            'Stoks'=> StokPakaian::with(['kategories','Ukuran','warna'])->paginate(20)
        ])->extends('layouts.app', ['header' => 'Stok', 'title' => 'Stok Pakaian'])->section('content');
    }
    public function destroy($id)
    {
        $files = StokPakaian::whereId($id);
        $name = $files->first()->photo;
        if(Storage::disk('public')->exists('/photos/'.$name)) {
            unlink(storage_path('app/public/photos/' .$name));
        }
        $this->dispatch(
            'alert',
            [
                'text' => "file has been deleted!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #ff3333, #ff6666)",
            ]
        );
        $files->delete();
    }
    public function paginationView()
    {
        return 'layouts.pagination';
    }
}
