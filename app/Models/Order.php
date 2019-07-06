<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = 
    [
    	'order_id','status','total_price','shipping_address','zip_code'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function orderItems()
    {
    	return $this->hasMany('App\Models\OrderItem');
    }
}
