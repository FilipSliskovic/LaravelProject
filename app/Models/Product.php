<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;


    public function GetAllImages()
    {
        return $this->Product::with('image')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Image()
    {
        return $this->belongsToMany(Image::class,'product_images');
    }


}
