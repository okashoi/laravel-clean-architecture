<?php

namespace MyApp\Entities\Task;

/**
 * メモ Value Object
 * @package MyApp\Entities\Task
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
