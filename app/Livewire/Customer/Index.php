<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $searching;
    #[On('customerAdd')]
    public function render()
    {
        return view('livewire.customer.index',[
            'Customers' =>Customer::search(trim($this->searching))->paginate(10)
        ])->extends('layouts.app', ['header' => 'Customer', 'title' => 'Customer'])->section('content');
    }
    public function destroy($id)
    {
        $files = Customer::whereId($id);

        $this->dispatch(
            'alert',
            [
                'text' => "Kostumer deleted!!",
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
