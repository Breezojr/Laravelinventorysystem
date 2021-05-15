<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'store_phone',
        'store_email',
        'store_street',
        'store_city',
        'store_state'
    ];
    public $timestamps = false;
} 
