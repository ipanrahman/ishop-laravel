<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
    ];
    public function user(){
        return  $this->belongsTo('App\User');
    }
    public function images()
    {
        return $this->belongsToMany('App\Models\Image', 'product_images');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories');
    }
    public function review(){
        return $this->belongsToMany('App\Review','product_reviews');
    }
}
