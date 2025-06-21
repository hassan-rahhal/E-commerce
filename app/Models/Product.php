<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'main_img',
        'quantity',
        'details'
    ];

    public function product_categories(){
        return $this->hasMany(ProductCategory::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
