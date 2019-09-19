<?php

namespace MyApp\Components\CreateInbox\Tests\UseCase;

use MyApp\Entities\Task\Id;

/**
 * Class InMemoryId
 * @package MyApp\Components\CreateInbox\Tests\UseCase
 */
final class InMemoryId implements Id
{
    /**
     * @var int
     */
    private $value;

    /**
     * InMemoryId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
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
     * @param Id $another
     * @return bool
     */
    public function equals(Id $another): bool
    {
        if (!$another instanceof static) {
            return false;
        }

        return $this->value === $another->value();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->value;
    }
}
