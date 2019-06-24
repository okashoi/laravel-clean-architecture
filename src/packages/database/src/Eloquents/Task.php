<?php

namespace MyApp\Database\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Task
 * @package MyApp\Database\Eloquents
 */
class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'note',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'   => 'integer',
        'name' => 'string',
        'note' => 'string',
    ];

    /**
     * @return HasOne
     */
    public function estimatedTime(): HasOne
    {
        return $this->hasOne(EstimatedTime::class);
    }

    /**
     * @return HasOne
     */
    public function startDate(): HasOne
    {
        return $this->hasOne(TaskStartDate::class);
    }

    /**
     * @return HasOne
     */
    public function completed(): HasOne
    {
        return $this->hasOne(CompletedTask::class);
    }
}
