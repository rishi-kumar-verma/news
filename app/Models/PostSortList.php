<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\PostSortList
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $sort_list_title
 * @property string|null $image_description
 * @property string|null $sort_list_content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array|string $post_sort_list_image
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $postSortLists
 * @property-read int|null $post_sort_lists_count
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList whereImageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList whereSortListContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList whereSortListTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostSortList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostSortList extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = "sort_list_post";
    protected $fillable = ['post_id', 'sort_list_title', 'image_description', 'sort_list_content'];
    const IMAGES = 'post_sort_list_images';
    protected $appends = ['post_sort_list_image'];

    /**
     * @var string[]
     */
    public static $rules = [
        'sort_list_title.*' => 'nullable|max:190',
    ];

    /**
     *
     * @return array|string
     */
    public function getPostSortListImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::IMAGES)->first();
        if (!empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    public function postSortLists(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class, 'post_id');
    }
}
