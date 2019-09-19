<?php

namespace MyApp\Entities\Task;

/**
 * タスク名 Value Object
 * @package MyApp\Entities\Task
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
