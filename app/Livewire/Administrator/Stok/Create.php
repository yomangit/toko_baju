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
    public $Ukuran, $Pencarian = '';
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
    #[Validate('required', message: 'kolom harga satuan tidak boleh kosong!!!')]
    public $harga_jual_rp;
    #[Validate('required', message: 'kolom harga pokok tidak boleh kosong!!!')]
    public $harga_pokok_rp;

    public $harga_jual;
    public $harga_pokok;
    public $filds = [];
    public $number;
    public $stok_id;
    public $kode_pakaian;
    public $ukuran_array;
    public $nama_foto;
    public $fileUpload;
    public $jumlah_stok;
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
        $this->stok_id = $stok->id;
        $this->Ukuran = ($this->stok_id) ? UkuranPakaian::whereId($stok->ukuran_pakaian_id)->get() : UkuranPakaian::get();
        if ($this->stok_id) {
            $this->ukuran_array = UkuranPakaian::whereId($stok->ukuran_pakaian_id)->first()->ukuran_pakaian;
            $this->filds[$this->ukuran_array][] = StokPakaian::whereId($this->stok_id)->pluck('jumlah_stok')->toArray();
            $this->ukuran_id =  UkuranPakaian::whereId($stok->ukuran_pakaian_id)->pluck('id')->toArray();
            $this->kode_pakaian = $stok->kode_pakaian;
            $this->nama_pakaian = $stok->nama_pakaian;
            $this->kategori_pakaian = $stok->kategori_id;
            $this->warna_id = $stok->warna_id;
            $this->harga_jual = $stok->harga_jual;
            $this->harga_pokok = $stok->harga_pokok;
            $this->nama_foto = $stok->photo;
        }
    }
    public function render()
    {


        if ($this->photo) {
            $this->nama_foto = $this->photo->getClientOriginalName();
            $this->fileUpload = pathinfo($this->nama_foto, PATHINFO_EXTENSION);
        }
        $Ukuran_Pakaian = UkuranPakaian::whereIn('id', $this->ukuran_id)->get();
        return view('livewire.administrator.stok.create', [
            'UkuranPakaian' =>  $Ukuran_Pakaian,
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
            $this->photo->storeAs('/img/', $this->nama_foto, ['disk' => 'public']);
        }
        if ($this->stok_id) {
            StokPakaian::whereId($this->stok_id)->update([
                'kode_pakaian' => $this->kode_pakaian,
                'nama_pakaian' => $this->nama_pakaian,
                'kategori_id' => $this->kategori_pakaian,
                'warna_id' => $this->warna_id,
                'harga_jual' => $this->harga_jual,
                'harga_pokok' => $this->harga_pokok,
                'photo' =>  $this->nama_foto,
                'ukuran_pakaian_id' => (int) $this->ukuran_id,
                'jumlah_stok' => (int) $this->filds[$this->ukuran_array],
            ]);
            $this->dispatch(
                'alert',
                [
                    'text' => "Stok Pakaian telah diupdate!!",
                    'duration' => 3000,
                    'destination' => '/contact',
                    'newWindow' => true,
                    'close' => true,
                    'backgroundColor' => "linear-gradient(to right, #00b09b, #96c93d)",
                ]
            );
            $this->closeModal();
        } else {
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
                if (array_keys($this->filds, $ukuran === $ukuran)) {
                    StokPakaian::create([
                        'kode_pakaian' => $this->kode_pakaian,
                        'nama_pakaian' => $this->nama_pakaian,
                        'kategori_id' => $this->kategori_pakaian,
                        'warna_id' => $this->warna_id,
                        'harga_jual' => $this->harga_jual,
                        'harga_pokok' => $this->harga_pokok,
                        'photo' =>  $this->nama_foto,
                        'ukuran_pakaian_id' => $value,
                        'jumlah_stok' => $this->filds[$ukuran]
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
            $this->modalOpen = "modal-open";
        }
        $this->dispatch('updateStok');
    }

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public function KeepData()
    {
        $this->reset('modalOpen');
    }
    public function resetData()
    {
        $this->reset('filds', 'ukuran_id', 'nama_pakaian', 'kategori_pakaian', 'warna_id', 'harga_jual', 'harga_pokok', 'photo', 'nama_foto', 'fileUpload', 'jumlah_stok', 'kode_pakaian', 'ukuran_array', 'modalOpen');
    }
    public static function modalMaxWidth(): string
    {
        return 'maxxl';
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
