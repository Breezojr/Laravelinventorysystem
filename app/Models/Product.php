<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'model_name',
        'brand_name',
        'model_number',
        'category_id'


    ];
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
