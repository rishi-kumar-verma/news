<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostArticle
 *
 * @property int $id
 * @property int $post_id
 * @property string|null $article_content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Post|null $postArticle
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle whereArticleContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostArticle whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostArticle extends Model
{
    use HasFactory;

    protected $table = "article_post";

    protected $fillable = ['post_id', 'article_content'];

    /**
     * @var string[]
     */
    public static $rules = [
        'article_content' => 'nullable',
    ];

    public function postArticle(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Post::class, 'post_id');
    }
}
