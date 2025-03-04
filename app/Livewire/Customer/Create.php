<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    #[Validate('required', message: 'kolom nama tidak boleh kosong!!!')]
    public  $name;
    #[Validate('required', message: 'kolom jenis kelamin tidak boleh kosong!!!')]
    public  $gender;
    #[Validate('required', message: 'kolom alamat tidak boleh kosong!!!')]
    public  $address;
    #[Validate('required', message: 'kolom no. telepon tidak boleh kosong!!!')]
    public  $phone_number;
    public $customer_id;

    public function mount(Customer $customer)
    {
        $this->customer_id = $customer->id;
        $this->name = $customer->name;
        $this->gender = $customer->gender;
        $this->address = $customer->address;
        $this->phone_number = $customer->phone_number;
    }
    public function render()
    {
        return view('livewire.customer.create');
    }
    public function store()
    {
        $this->validate();
        Customer::updateOrCreate(
            ['id' => $this->customer_id],
            [
                'name' => $this->name,
                'gender' => $this->gender,
                'address' => $this->address,
                'phone_number' => $this->phone_number,
            ]
        );
        if ($this->customer_id) {
            $this->dispatch(
                'alert',
                [
                    'text' => "Kostumer telah diupdate!!",
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                ]
            );
        } else {
            $this->dispatch(
                'alert',
                [
                    'text' => "Kostumer telah ditambahkan!!",
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                ]
            );
        }

        $this->dispatch('customerAdd');
        $this->reset(['name', 'gender', 'address', 'phone_number']);
        $this->closeModal();
    }
    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
