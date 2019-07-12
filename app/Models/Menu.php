<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Menu
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MenuRole[] $role_menu
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Menu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Menu withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Menu withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 */
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
