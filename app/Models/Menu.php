<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $title
 * @property string|null $link
 * @property int|null $parent_menu_id
 * @property int|null $order
 * @property int $show_in_menu
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Navigation[] $navigation
 * @property-read int|null $navigation_count
 * @property-read Menu|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Menu[] $submenu
 * @property-read int|null $submenu_count
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereShowInMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = [
      'title',
      'link',
      'parent_menu_id',
      'order',
      'show_in_menu',
    ];

    const SHOW_MENU_ACTIVE = 1;
    const SHOW_MENU_DEACTIVE = 0;
    const SHOW_MENU = [
        self::SHOW_MENU_ACTIVE   => 'Active',
        self::SHOW_MENU_DEACTIVE   => 'Deactive',
    ];

    public function submenu()
    {
        return $this->hasMany(\App\Models\Menu::class, 'parent_menu_id');
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Menu::class, 'parent_menu_id');
    }

    public function navigation()
    {
        return $this->morphOne(Navigation::class,'navigationable');
    }
}
