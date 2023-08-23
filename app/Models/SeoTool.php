<?php

namespace App\Models;

use App\Models\language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SeoTool
 *
 * @property int $id
 * @property int $lang_id
 * @property string $site_title
 * @property string $home_title
 * @property string $site_description
 * @property string $keyword
 * @property string $google_analytics
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool query()
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereGoogleAnalytics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereHomeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereSiteDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereSiteTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeoTool whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SeoTool extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_id',
        'site_title',
        'home_title',
        'site_description',
        'keyword',
        'google_analytics',
    ];

    public static $rules = [
        'lang_id' => 'required',
        'site_title' => 'required|max:190',
        'home_title' => 'required|max:190',
        'site_description' => 'required',
        'keyword' => 'required'
    ];

    function language()
    {

        return $this->belongsTo(\App\Models\Language::class, 'lang_id');
    }

}
