<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Album
 *
 * @property int $id
 * @property int $lang_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Album whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = ['name', 'lang_id'];

    /**
     * @return BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'album_id');
    }

    public function AlbumCategory()
    {
        return $this->hasMany(AlbumCategory::class, 'album_id');
    }
}
