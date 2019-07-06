<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
     protected $fillable = [
        'image_src',
    ];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_images');
    }
}
