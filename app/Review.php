<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=['rating','description'];
    public function product()
    {
        return $this->belongsToMany('App\Models\Product','product_reviews');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
