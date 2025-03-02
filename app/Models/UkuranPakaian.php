<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UkuranPakaian extends Model
{
    protected $table = 'ukuran_pakaians';

    protected $fillable = [
        'ukuran_pakaian',
    ];
}
