<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokPakaian extends Model
{
    protected $table = 'products';

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

    public function scopeSearch($query, $term)
    {
        return $query->where('kode_pakaian', 'LIKE',  $term);
    }
    public function transaksi_details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
