<?php

namespace MyApp\Entities\Task;

/**
 * 見積もり時間 Value Object
 *
 * @package MyApp\Entities\Task
 */
final class EstimatedTime
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
     * @throws InvalidArgumentException
     */
    public function __construct(int $hours, int $minutes)
    {
        if ($hours < 0) {
            throw new InvalidArgumentException('見積もり時間（時間）には正の整数を指定してください');
        }

        if ($minutes < 0 || 59 < $minutes) {
            throw new InvalidArgumentException('見積もり時間（分）には 0〜59 の範囲の整数を指定してください');
        }

        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    /**
     * @return int
     */
    public function hours(): int
    {
        return $this->hours;
    }

    /**
     * @return int
     */
    public function minutes(): int
    {
        return $this->minutes;
    }
}
