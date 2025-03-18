<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cjmellor\Approval\Concerns\MustBeApproved;

class Transaksi extends Model
{

    protected $table = 'transaksis';
    protected $fillable = ['user_id', 'quantity', 'total_price', 'transaction_date', 'payment', 'cashback', 'customer_id', 'pay_method'];

    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function transaksi_details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
