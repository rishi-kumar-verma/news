<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Navigation
 *
 * @property int $id
 * @property string|null $navigationable_type
 * @property int|null $navigationable_id
 * @property int|null $order_id
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $navigationable
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereNavigationableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereNavigationableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Navigation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Navigation extends Model
{
    use HasFactory;

    protected $table = 'navigation';

    protected $fillable = [
        'navigationable_type',
        'navigationable_id',
        'order_id',
        'parent_id',
    ];

    public function navigationable()
    {
        return $this->morphTo();
    }
}
