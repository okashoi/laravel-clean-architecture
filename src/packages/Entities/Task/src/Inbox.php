<?php

namespace MyApp\Entities\Task;

use DatetimeImmutable;

/**
 * Class Inbox
 * @package MyApp\Entities\Task
 */
final class Inbox extends Task
{
    /**
     * @var EstimatedTime|null
     */
    private $estimatedTime;

    /**
     * タスクの見積もり時間を設定する
     *
     * @param Estimatedtime $estimatedTime
     */
    public function setEstimatedTime(Estimatedtime $estimatedTime): void
    {
        $this->estimatedTime = $estimatedTime;
    }

    /**
     * 見積もり時間が設定されているかどうかを返す
     *
     * @return bool 見積もり時間が設定されている場合 true / そうでない場合は false
     */
    public function hasEstimatedTime(): bool
    {
        return !is_null($this->estimatedTime);
    }

    /**
     * @return EstimatedTime
     * @throws EstimatedTimeNotSet 見積もり時間が設定されていない場合
     */
    public function estimatedTime(): EstimatedTime
    {
        if (!$this->hasEstimatedTime()) {
            throw new EstimatedTimeNotSet();
        }

        return $this->estimatedTime;
    }

    /**
     * 着手日を設定して Scheduled に変換する
     *
     * @param StartDate $startDate
     * @return Scheduled
     * @throws EstimatedTimeNotSet 見積もり時間が設定されていない場合
     * @throws InvalidArgumentException
     */
    public function convertToScheduled(StartDate $startDate): Scheduled
    {
        if (!$this->hasEstimatedTime()) {
            throw new EstimatedTimeNotSet();
        }

        if ($startDate->value() < new DatetimeImmutable('today')) {
            throw new InvalidArgumentException('着手日は今日以降の日付を指定してください');
        }

        return new Scheduled($this->id, $this->name, $this->estimatedTime, $startDate, $this->note);
    }
}
