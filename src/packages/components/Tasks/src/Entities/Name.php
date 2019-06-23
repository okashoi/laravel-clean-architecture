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
