<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\PostGallery
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $gallery_title
 * @property string|null $image_description
 * @property string|null $gallery_content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array|string $post_gallery_image
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $postGalleries
 * @property-read int|null $post_galleries_count
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery whereGalleryContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery whereGalleryTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery whereImageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostGallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostGallery extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = "gallery_post";
    protected $fillable = ['post_id', 'gallery_title', 'image_description', 'gallery_content'];
    const IMAGES = 'post_gallery_images';
    protected $appends = ['post_gallery_image'];
    /**
     * @var string[]
     */
    public static $rules = [
        'gallery_title.*' => 'nullable|max:190',
    ];

    /**
     *
     * @return array|string
     */
    public function getPostGalleryImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::IMAGES)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    public function postGalleries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
