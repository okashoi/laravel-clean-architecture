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
     * Note constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
