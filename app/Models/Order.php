<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
    'customer_id',
    'order_status',
    'order_date',
    'required_date',
    'shipped_date',
    'store_id',
    'employee_id'
    ];
    public $timestamps = false;
}
