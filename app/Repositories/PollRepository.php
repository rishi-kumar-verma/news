<?php

namespace App\Repositories;

use App\Models\Poll;
use Arr;
use Hash;

/**
 * Class UserRepository
 */
class PollRepository extends BaseRepository
{
    public $fieldSearchable = [
        'lang_id',
        'question',
    ];

    /**
     * @inheritDoc
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Poll::class;
    }

}
