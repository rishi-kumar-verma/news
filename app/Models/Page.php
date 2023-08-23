<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $meta_title
 * @property string $meta_description
 * @property int $parent_menu_link
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereParentMenuLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property int $location
 * @property int $visibility
 * @property int $show_title
 * @property int $show_right_column
 * @property int $show_breadcrumb
 * @property int $permission
 * @property string|null $content
 * @property-read \App\Models\Language $language
 * @property-read \App\Models\Menu $parentMenu
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page wherePermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereShowBreadcrumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereShowRightColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereShowTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereVisibility($value)
 */
class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $fillable = [
        'name', 'title', 'slug', 'meta_title', 'meta_description', 'lang_id', 'show_title',
        'show_right_column', 'permission', 'location', 'visibility', 'show_breadcrumb', 'content',
    ];

    const VISIBILITY_ACTIVE = 1;
    const VISIBILITY_DEACTIVE = 0;

    const SHOW_BREADCRUMP_ACTIVE = 1;
    const SHOW_BREADCRUMP_DEACTIVE = 0;

    const SHOW_RIGHT_ACTIVE = 1;
    const SHOW_RIGHT_DEACTIVE = 0;

    const SHOW_TITLE_ACTIVE = 1;
    const SHOW_TITLE_DEACTIVE = 0;

    const PERMISION_ACTIVE = 1;
    const PERMISION_DEACTIVE = 0;

    const MAIN_MENU = 2;
    const DONT_ADD_MENU = 4;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'name'             => 'required|max:190',
        'title'            => 'required|max:190',
        'lang_id'          => 'required',
        'slug'             => 'required|unique:pages,slug',
        'meta_description' => 'required|max:160',
        'meta_title'       => 'required|max:100',
        'content'          => 'nullable',
        'location'         => 'required',
    ];

}
