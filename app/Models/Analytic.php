<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Analytic
 *
 * @property int $id
 * @property string|null $uri
 * @property string|null $session
 * @property string|null $country
 * @property string|null $ip
 * @property string|null $post_id
 * @property string|null $user_id
 * @property string|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereUserId($value)
 * @mixin \Eloquent
 */
class Analytic extends Model
{
    use HasFactory;

    protected $table = 'analytics';

    protected $fillable = [
        'session',
        'uri',
        'country',
        'ip',
        'user_id',
        'post_id',
        'meta',
    ];
}
