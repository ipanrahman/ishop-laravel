<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    public $table = 'menus';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name'];

    public function sql()
    {
        return $this
            ->select(
                $this->table.'.id',
                $this->table.'.name'
            )->orderBy(
                $this->table.'.name'
            );
    }

    public function role_menu()
    {
        return $this->hasMany(MenuRole::class);
    }
}
