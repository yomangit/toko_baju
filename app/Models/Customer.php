<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'gender',
        'phone_number',
        'address',
    ];
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'LIKE', '%' . $term . '%')
                     ->orWhere('phone_number', 'LIKE', '%' . $term . '%')
                     ->orWhere('address', 'LIKE', '%' . $term . '%');
    }

}
