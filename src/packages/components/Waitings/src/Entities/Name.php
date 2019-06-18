<?php

namespace MyApp\Components\Waitings\Entities;

/**
 * 連絡待ち名 Value Object
 * @package MyApp\Components\Waitings\Entities
 */
final class Name
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
