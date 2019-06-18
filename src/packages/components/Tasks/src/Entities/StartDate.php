<?php

namespace MyApp\Components\Tasks\Entities;

use DatetimeInterface;

/**
 * Class StartDate
 * @package MyApp\Components\Tasks\Entities
 */
final class StartDate
{
    /**
     * @var DateTimeInterface
     */
    private $value;

    /**
     * StartDate constructor.
     * @param DatetimeInterface $value
     */
    private function __construct(DatetimeInterface $value)
    {
        $this->value = $value;
    }

    /**
     * @param DatetimeInterface $value
     * @return StartDate
     */
    public static function fromNative(DatetimeInterface $value): self
    {
        return static::fromNative($value);
    }
}
