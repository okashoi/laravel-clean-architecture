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
     * @throws InvalidArgumentException
     */
    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new InvalidArgumentException('ID には正の整数を指定してください');
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}
