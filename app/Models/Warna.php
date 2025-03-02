<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    protected $table = 'warnas';

    protected $fillable = [
        'nama_warna',
    ];
}
