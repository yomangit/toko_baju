<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cjmellor\Approval\Concerns\MustBeApproved;

class Transaksi extends Model
{
    use MustBeApproved;
    protected $table = 'transaksis';
    protected $fillable = ['nama_pakaian', 'column2', 'column3'];
}
