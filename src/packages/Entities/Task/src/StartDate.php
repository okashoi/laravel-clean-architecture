<?php

namespace MyApp\Entities\Task;

use DateTime;
use Exception;
use DateTimeImmutable;
use DatetimeInterface;

/**
 * Class StartDate
 * @package MyApp\Entities\Task
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

    /**
     * @return DateTimeImmutable
     * @throws Exception
     */
    public function value(): DateTimeImmutable
    {
        if ($this->value instanceof DateTimeImmutable) {
            return $this->value;
        }

        if ($this->value instanceof DateTime) {
            return DateTimeImmutable::createFromMutable($this->value);
        }

        $dateTimeImmutable = new DateTimeImmutable(null, $this->value->getTimezone());
        return $dateTimeImmutable->setTimestamp($this->value->getTimestamp());
    }
}
