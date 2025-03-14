<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cjmellor\Approval\Concerns\MustBeApproved;

class TransaksiDetail extends Model
{
    use MustBeApproved;
    protected $table = 'transaksi_details';
    protected $fillable = ['transaksi_id', 'product_id', 'quantity', 'price', 'transaction_date'];
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
    public function stokPakaian()
    {
        return $this->belongsTo(StokPakaian::class, 'product_id');
    }
}
