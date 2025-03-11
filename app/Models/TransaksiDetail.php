<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = 'transaksi_details';
    protected $fillable = ['transaksi_id', 'product_id', 'quantity', 'price'];


    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
    public function stokPakaian()
    {
        return $this->belongsTo(StokPakaian::class, 'product_id');
    }
}
