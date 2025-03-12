<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cjmellor\Approval\Concerns\MustBeApproved;

class Transaksi extends Model
{

    protected $table = 'transaksis';
    protected $fillable = ['user_id', 'quantity', 'total_price', 'transaction_date'];
}
