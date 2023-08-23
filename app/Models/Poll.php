<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Poll
 *
 * @property int $id
 * @property int $lang_id
 * @property string $question
 * @property string $option1
 * @property string $option2
 * @property string $option3
 * @property string $option4
 * @property string $option5
 * @property string $option6
 * @property string $option7
 * @property string $option8
 * @property string $option9
 * @property string $option10
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Poll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll query()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereLangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption7($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption8($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereOption9($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $vote_permission
 * @property-read \App\Models\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereVotePermission($value)
 */
class Poll extends Model
{
    use HasFactory;

    protected $table = 'polls';

    protected $fillable = [
        'lang_id', 'question', 'option1', 'option2', 'option3', 'option4', 'option5', 'option6', 'option7', 'option8',
        'option9', 'option10', 'status', 'vote_permission',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        'lang_id' => 'required',
        'question' => 'required|max:181',
        'option1' => 'required|max:181',
        'option2' => 'required|max:181',
        'option3' => 'max:181',
        'option4' => 'max:181',
        'option5' => 'max:181',
        'option6' => 'max:181',
        'option7' => 'max:181',
        'option8' => 'max:181',
        'option9' => 'max:181',
        'option10' => 'max:181',
    ];

}
