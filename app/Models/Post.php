<?php

namespace App\Models;

use App\Scopes\AuthoriseUserActivePostScope;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $keywords
 * @property int $visibility
 * @property int $show_right_column
 * @property int $featured
 * @property int $breaking
 * @property int $slider
 * @property int $recommended
 * @property int $show_on_headline
 * @property int $show_registered_user
 * @property string|null $optional_url
 * @property string $tags
 * @property int $post_types
 * @property int $lang_id
 * @property int $category_id
 * @property int $sub_category_id
 * @property int $scheduled_post
 * @property int $status
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read array $additional_image
 * @property-read array $post_file
 * @property-read array $post_file_name
 * @property-read string $post_image
 * @property-read mixed $type_name
 * @property-read \App\Models\Language $language
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\PostArticle|null $postArticle
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostGallery[] $postGalleries
 * @property-read int|null $post_galleries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostSortList[] $postSortLists
 * @property-read int|null $post_sort_lists_count
 * @property-read \App\Models\SubCategory $subCategory
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereBreaking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereOptionalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRecommended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereScheduledPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereShowOnHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereShowRegisteredUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereVisibility($value)
 * @mixin \Eloquent
 */
class   Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'posts';

    protected $fillable = [
        'created_by', 'title', 'slug', 'description', 'keywords', 'visibility', 'featured', 'breaking', 'slider',
        'recommended', 'show_registered_user', 'tags', 'optional_url', 'additional_images ', 'files', 'lang_id',
        'category_id', 'sub_category_id', 'scheduled_post', 'scheduled_post_time', 'status', 'post_types', 'section',
        'show_on_headline',
    ];

    const IMAGE_POST = 'post image';
    const FILE_POST = 'post file';
    const ADDITIONAL_IMAGES = 'additional images';

    const VISIBILITY_ACTIVE = 1;
    const VISIBILITY_DEACTIVE = 0;

    const SHOW_REGISTRED_USER_ACTIVE = 1;
    const SHOW_REGISTRED_USER_DEACTIVE = 0;

    const RECOMMENDED_ACTIVE = 1;
    const RECOMMENDED_DEACTIVE = 0;

    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;

    const FEATURED_ACTIVE = 1;
    const FEATURED_DEACTIVE = 0;

    const HEADLINE_ACTIVE = 1;
    const HEADLINE_DEACTIVE = 0;

    const BREAKING_ACTIVE = 1;
    const BREAKING_DEACTIVE = 0;

    const SLIDER_ACTIVE = 1;
    const SLIDER_DEACTIVE = 0;

    const ARTICLE = 'article';
    const GALLERY = 'gallery';
    const SORT_LIST = 'sort_list';
    const TRIVIA_QUIZ = 'trivia_quiz';
    const PERSONALITY_QUIZ = 'personality_quiz';
    const VIDEO = 'video';
    const AUDIO = 'audio';

    const POST_FORMAT = 'post_format';
    const ARTICLE_CREATE = 'article/create';
    const GALLERY_CREATE = 'gallery/create';
    const SORT_LIST_CREATE = 'sort_list/create';
    const TRIVIA_QUIZ_CREATE = 'trivia_quiz/create';
    const PERSONALITY_QUIZ_CREATE = 'personality_quiz/create';
    const VIDEO_CREATE = 'video/create';
    const AUDIO_CREATE = 'audio/create';

    const ADD_ARTICLE = 'add_article';
    const ADD_GALLERY = 'add_gallery';
    const ADD_AUDIO = 'add_audio';
    const ADD_VIDEO = 'add_video';
    const ADD_TRIVIA_QUIZE = 'add_trivia_quiz';
    const ADD_PERSONALITY_QUIZ = 'add_personality_quiz';
    const ADD_SORT_LIST = 'add_sort_list';


    const ARTICLE_TYPE_ACTIVE = 1;
    const GALLERY_TYPE_ACTIVE = 2;
    const SORTED_TYPE_ACTIVE = 3;
    const TRIVIA_TYPE_ACTIVE = 4;
    const PERSONALITY_TYPE_ACTIVE = 5;
    const VIDEO_TYPE_ACTIVE = 6;
    const AUDIO_TYPE_ACTIVE = 7;
    const POST_TYPE_DEACTIVA = 0;

    const TYPE = [
        self::ARTICLE_TYPE_ACTIVE     => 'Article',
        self::GALLERY_TYPE_ACTIVE     => 'Gallery',
        self::SORTED_TYPE_ACTIVE      => 'Sorted',
    ];
    protected $with = ['media'];

    protected $appends = ['post_image', 'post_file', 'additional_image', 'type_name'];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'title'       => 'required|max:190',
        'slug'        => 'required|unique:posts,slug',
        'description' => 'required',
        'keywords'    => 'required|max:190',
        'tags'        => 'required',
        'image'       => 'required|mimes:jpeg,png,jpg,webp,svg',
        'lang_id'     => 'required',
        'category_id' => 'required',
    ];

    /**
     * @return string
     */
    public function getPostImageAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(self::IMAGE_POST)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('front_web/images/default.jpg');
    }

    /**
     * @return array
     */
    public function getPostFileAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::FILE_POST);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->getFullUrl();
            } else {
                $mediaUrl = [asset('front_web/images/default.jpg')];
            }
        }

        return $mediaUrl;
    }


    /**
     * @return array
     */
    public function getPostFileNameAttribute(): array
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::FILE_POST);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->file_name;
            }
        }

        return $mediaUrl;
    }

    /**
     * @return array
     */
    public function getAdditionalImageAttribute()
    {
        /** @var Media $media */
        $medias = $this->getMedia(self::ADDITIONAL_IMAGES);
        $mediaUrl = [];
        foreach ($medias as $media) {
            if (! empty($media)) {
                $mediaUrl[] = $media->getFullUrl();
            } else {
                $mediaUrl = [asset('front_web/images/default.jpg')];
            }
        }

        return $mediaUrl;
    }


    public function getTypeNameAttribute($value)
    {
        return self::TYPE[$this->post_types];
    }

    /**
     * @return HasOne
     */
    public function postArticle(): HasOne
    {
        return $this->hasOne(PostArticle::class);
    }

    /**
     * @return HasMany
     */
    public function postGalleries(): HasMany
    {
        return $this->hasMany(PostGallery::class);
    }

    /**
     * @return HasMany
     */
    public function postSortLists(): HasMany
    {
        return $this->hasMany(PostSortList::class);
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AuthoriseUserActivePostScope());

        static::addGlobalScope(new LanguageScope());

        static::addGlobalScope(new PostDraftScope());
    }

    /**
     * @return HasMany
     */
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
