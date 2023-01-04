<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    public function product()
    {
        return $this->hasMany(Product::class,);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function parent()
    {
        // recursively return all parents
        // the with() function call makes it recursive.
        // if you remove with() it only returns the direct parent
        return $this->belongsTo('App\Models\Category', 'parent_id')->with('parent');
    }

    public function child()
    {
        // recursively return all children
        return $this->hasOne('App\Models\Category', 'parent_id')->with('child');
    }




}
