<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\AlbumCategory
 *
 * @property int $id
 * @property int $lang_id
 * @property int $album_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Album $album
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AlbumCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AlbumCategory extends Model
{
    use HasFactory;

    protected $table = 'album_categories';

    protected $fillable = [
        'name',
        'lang_id',
        'album_id',
    ];

    /**
     * @return BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class,'lang_id');
    }

    /**
     * @return BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class,'album_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

}
