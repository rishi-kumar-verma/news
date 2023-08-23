<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property int $lang_id
 * @property int $album_id
 * @property int $category_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Album $album
 * @property-read \App\Models\AlbumCategory $category
 * @property-read array|string $gallery_image
 * @property-read \App\Models\Language $language
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'galleries';
    protected $fillable = [
        'lang_id', 'album_id', 'category_id', 'title',
    ];
    const GALLERY_IMAGE = 'gallery_images';
    protected $appends = ['gallery_image'];

    /**
     *
     *
     * @return array|string
     */
    public function getGalleryImageAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::GALLERY_IMAGE);
        $images = [];
        if (!empty($medias)) {
            foreach ($medias as $key => $media) {
                $images[$key] = $media->getFullUrl();
            }

            return $images;
        }


        return asset('front_web/images/default.jpg');
    }


    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    public function album(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AlbumCategory::class, 'category_id');
    }
}
