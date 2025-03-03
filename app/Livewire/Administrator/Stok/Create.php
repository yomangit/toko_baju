<?php

namespace App\Livewire\Administrator\Stok;

use App\Models\Kategori;
use App\Models\Stok;
use App\Models\StokPakaian;
use App\Models\UkuranPakaian;
use App\Models\Warna;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    use WithFileUploads;
    public $Ukuran;
    #[Validate('nullable', message: 'kolom foto pakaian tidak boleh kosong!!!')]
    #[Validate('image', message: 'harus file foto!!!')]
    public $photo;
    #[Validate('required', message: 'kolom ukuran harus di centang!!!')]
    public $ukuran_id = [];
    #[Validate('required', message: 'kolom nama pakaian tidak boleh kosong!!!')]
    public $nama_pakaian;
    #[Validate('required', message: 'kolom kategori pakaian tidak boleh kosong!!!')]
    public $kategori_pakaian;
    #[Validate('nullable', message: 'kolom Warna pakaian tidak boleh kosong!!!')]
    public $warna_id;
    #[Validate('required', message: 'kolom harga jual tidak boleh kosong!!!')]
    public $harga_jual;
    #[Validate('required', message: 'kolom harga pokok tidak boleh kosong!!!')]
    public $harga_pokok;

    public $filds = [];
    public $number;
    public $stok_id;
    public $kode_pakaian;
    public $nama_foto;
    public $fileUpload;

    public $ukuran_parameter = "ukuran_pakaian";
    public $kategori_parameter = "kategori_pakaian";
    public $warna_parameter = "nama_warna";
    public $modalOpen;

    protected $rules = [
        'ukuran_id' => 'required',
        'filds.*' => 'required'
    ];

    #[On('updateUkuranPakaian')]
    #[On('updateKateogriPakaian')]
    #[On('updateWarnaPakaian')]
    public function mount(StokPakaian $stok)
    {
        $this->Ukuran = UkuranPakaian::get();
        $this->stok_id = $stok->id;
        $this->filds = $stok->jumlah_stok;
        $ukuran = UkuranPakaian::whereId($stok->ukuran_pakaian_id)->first()->ukuran_pakaian;
        $this->ukuran_id[ $ukuran][] = $stok->ukuran_pakaian_id;
        $this->nama_pakaian= $stok->nama_pakaian;
        $this->kategori_pakaian = $stok->kategori_id;
        $this->warna_id = $stok->warna_id;
        $this->harga_jual = $stok->harga_jual;
        $this->harga_pokok = $stok->harga_pokok;
        $this->nama_foto = $stok->photo;
    }
    public function render()
    {


        if ($this->photo) {
            $this->nama_foto = $this->photo->getClientOriginalName();
            $this->fileUpload = pathinfo($this->nama_foto, PATHINFO_EXTENSION);
        }

        return view('livewire.administrator.stok.create', [
            'UkuranPakaian'=> UkuranPakaian::whereIn('id',$this->ukuran_id)->get(),
            'Kategori' => Kategori::get(),
            'Warna' => Warna::get()
        ]);
    }

    public function store()
    {
        $this->validate();
        if ($this->photo) {
            $this->nama_foto = $this->photo->getClientOriginalName();
            $ext = $this->photo->extension();
            $this->photo->storeAs('/img/', $this->nama_foto,['disk' => 'public']);
        }

        foreach ($this->ukuran_id as $key => $value) {

            $lastStok = StokPakaian::orderBy('id', 'desc')->first();
            if ($lastStok) {
                $lastKode = (int) substr($lastStok->kode_pakaian, -4);
                $newKode = str_pad($lastKode + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newKode = '0001';
            }
            $ukuran = UkuranPakaian::whereId($this->ukuran_id[$key])->first()->ukuran_pakaian;
            $this->kode_pakaian = 'MP-' . $newKode . '-' . $ukuran;
            if(array_keys($this->filds,$ukuran === $ukuran)){
                StokPakaian::create([
                    'kode_pakaian' => $this->kode_pakaian,
                    'nama_pakaian' => $this->nama_pakaian,
                    'kategori_id' => $this->kategori_pakaian,
                    'warna_id' => $this->warna_id,
                    'harga_jual' => $this->harga_jual,
                    'harga_pokok' => $this->harga_pokok,
                    'photo' =>  $this->nama_foto,
                    'ukuran_pakaian_id' => $value,
                    'jumlah_stok' =>$this->filds[$ukuran]
                ]);

                }

        }
        $this->dispatch(
            'alert',
            [
                'text' => "Stok Pakaian telah ditambahkan!!",
                'duration' => 3000,
                'destination' => '/contact',
                'newWindow' => true,
                'close' => true,
                'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
            ]
        );
        $this->modalOpen ="modal-open";
        $this->dispatch('updateStok');
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return 'maxxl';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
