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
    private function __construct(int $value)
    {
        if ($value < 1) {
            throw new \InvalidArgumentException();
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

    /**
     * @param int $value
     * @return Id
     */
    public static function fromNative(int $value): self
    {
        return new static($value);
    }

    /**
     * 同一の ID かどうかを比較する
     *
     * @param self $another
     * @return bool
     */
    public function equals(self $another)
    {
        return $this->value === $another->value();
    }
}
