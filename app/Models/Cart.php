<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cart
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property string $product_name
 * @property float $product_price
 * @property string $product_image_url
 * @property int $quantity
 * @property float|null $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereProductImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereProductPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cart whereUserId($value)
 */
class Cart extends Model
{
    protected $fillable = ['quantity'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
