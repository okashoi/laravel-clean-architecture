<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * タスク名 Value Object
 *
 * Class Name
 * @package MyApp\Components\Tasks\Entities
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
    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param string $value
     * @return Name
     */
    public static function fromNative(string $value): self
    {
        return new static($value);
    }
}
