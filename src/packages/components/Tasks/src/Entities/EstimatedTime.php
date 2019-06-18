<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * 見積もり時間 Value Object
 *
 * Class EstimatedTime
 * @package MyApp\Components\Tasks\Entities
 */
class EstimatedTime
{
    /**
     * 見積もり時間（時間）
     *
     * @var int
     */
    private $hours;

    /**
     * 見積もり時間（分）
     *
     * @var int
     */
    private $minutes;

    /**
     * EstimatedTime constructor.
     * @param int $hours
     * @param int $minutes
     * @throws \InvalidArgumentException
     */
    private function __construct(int $hours, int $minutes)
    {
        if ($hours < 0) {
            throw new \InvalidArgumentException();
        }

        if ($minutes < 0 || 59 < $minutes) {
            throw new \InvalidArgumentException();
        }

        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    /**
     * 見積もり時間の時間・分からインスタンスを生成
     *
     * @param int $hours 見積もり時間（時間）
     * @param int $minutes 見積もり時間（分）
     * @return EstimatedTime
     * @throws \InvalidArgumentException
     */
    public static function fromHoursAndMinutes(int $hours, int $minutes): self
    {
        return new static($hours, $minutes);
    }
}
