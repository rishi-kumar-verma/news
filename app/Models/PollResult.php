<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PollResult
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property int $poll_id
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult wherePollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereUserId($value)
 * @mixin \Eloquent
 */
class PollResult extends Model
{
    use HasFactory;

    protected $table = 'poll_result';

    protected $fillable = [
        'user_id',
        'poll_id',
        'answer',
        'ip_address'
    ];

    /**
     *
     * @return BelongsTo
     */
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }
}
