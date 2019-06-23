<?php

namespace MyApp\Database\Eloquents;

use Illuminate\Database\Eloquent\Model;

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
}
