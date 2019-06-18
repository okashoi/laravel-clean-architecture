<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * メモ Value Object
 *
 * Class Note
 * @package MyApp\Components\Tasks\Entities
 */
final class Note
{
    /**
     * @var string
     */
    private $value;

    /**
     * Name constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
