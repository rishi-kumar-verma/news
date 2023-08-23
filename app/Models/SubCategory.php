<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property string $show_in_menu
 * @property int $parent_category_id
 * @property int $lang_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereParentCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereShowInMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Language $language
 * @property-read \App\Models\Navigation|null $navigation
 */
class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = ['name','lang_id','parent_category_id','show_in_menu','slug'];

    const SHOW_MENU_ACTIVE = 1;
    const SHOW_MENU_DEACTIVE = 0;
    const SHOW_MENU = [
        self::SHOW_MENU_ACTIVE   => 'Active',
        self::SHOW_MENU_DEACTIVE   => 'Deactive',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function language()
    {
        return $this->belongsTo(Language::class,'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function category()
    {
        return $this->belongsTo(Category::class,'parent_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function navigation()
    {
        return $this->morphOne(Navigation::class,'navigationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function post()
    {
        return $this->hasMany(Post::class, 'sub_category_id', 'id');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'name' => 'required|max:190',
        'slug' => 'required|unique:sub_categories,slug',
        'lang_id' => 'required',
        'parent_category_id' => 'required',
    ];

}
