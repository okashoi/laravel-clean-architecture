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
    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @param string $value
     * @return Note
     */
    public static function fromNative(string $value): self
    {
        return new static($value);
    }
}
