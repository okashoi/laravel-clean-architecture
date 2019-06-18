<?php

namespace MyApp\Components\Waitings\Entities;

/**
 * メモ Value Object
 * @package MyApp\Components\Waitings\Entities
 */
final class Note
{
    /**
     * @var string
     */
    private $value;

    /**
     * Note constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
