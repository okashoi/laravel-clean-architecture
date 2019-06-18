<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * タスク ID Value Object
 *
 * Class Id
 * @package MyApp\Components\Tasks\Entities
 */
final class Id
{
    /**
     * @var int
     */
    private $value;

    /**
     * Id constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new \InvalidArgumentException();
        }

        $this->value = $value;
    }
}
