<?php

namespace MyApp\Database\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne};

/**
 * Class Scheduled
 * @package MyApp\Database\Eloquents
 */
class Scheduled extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'estimated_time_hours',
        'estimated_time_seconds',
        'start_date',
        'note',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'estimated_time_hours' => 'integer',
        'estimated_time_seconds' => 'integer',
        'start_date' => 'date',
        'note' => 'string',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'start_date',
    ];

    /**
     * @return BelongsTo
     */
    public function inbox(): BelongsTo
    {
        return $this->belongsTo(Inbox::class, 'id');
    }

    /**
     * @return HasOne
     */
    public function completed(): HasOne
    {
        return $this->hasOne(Completed::class, 'id');
    }
}
