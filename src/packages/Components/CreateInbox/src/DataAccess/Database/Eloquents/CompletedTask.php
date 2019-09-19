<?php

namespace MyApp\Components\CreateInbox\DataAccess\Database\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo};

/**
 * Class CompletedTask
 * @package MyApp\Components\CreateInbox\DataAccess\Database\Eloquents
 */
class CompletedTask extends Model
{
    protected $primaryKey = 'task_id';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'task_id' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
