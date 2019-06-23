<?php

namespace MyApp\Database\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne, HasOneThrough};

/**
 * Class Inbox
 * @package MyApp\Database\Eloquents
 */
class Inbox extends Model
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
    public function scheduled(): HasOne
    {
        return $this->hasOne(Scheduled::class, 'id');
    }

    /**
     * @return HasOneThrough
     */
    public function completed(): HasOneThrough
    {
        return $this->hasOneThrough(Comleted::class, Scheduled::class, 'id', 'id');
    }
}
