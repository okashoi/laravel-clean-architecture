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
    public function __construct(DatetimeInterface $value)
    {
        $this->value = $value;
    }
}
