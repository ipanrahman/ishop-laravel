<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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