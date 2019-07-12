<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuRole
 *
 * @property-read \App\Models\Menu $menu
 * @property-read \App\Models\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $role_id
 * @property int|null $menu_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuRole whereUpdatedAt($value)
 */
class MenuRole extends Model
{
    public $table = 'menu_role';

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['role_id', 'menu_id'];

    public function sql()
    {
        //
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}