<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['name', 'description'];

    public function sql()
    {
        return $this
            ->select(
                $this->table . '.id',
                $this->table . '.name',
                $this->table . '.description'
            )->orderBy(
            $this->table . '.name'
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_role');
    }

    public function menuRole()
    {
        return $this->hasMany(MenuRole::class);
    }
}
