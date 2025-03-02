<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokPakaian extends Model
{
    protected $table = 'stoks';

    protected $fillable = [
        'kode_pakaian',
        'nama_pakaian',
        'jumlah_stok',
        'harga_jual',
        'harga_pokok',
        'photo',
        'warna_id',
        'kategori_id',
        'ukuran_pakaian_id',
    ];
    public function kategories()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function warna()
    {
        return $this->belongsTo(Warna::class, 'warna_id');
    }
    public function Ukuran()
    {
        return $this->belongsTo(UkuranPakaian::class, 'ukuran_pakaian_id');
    }
}
