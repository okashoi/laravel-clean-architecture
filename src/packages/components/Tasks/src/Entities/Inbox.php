<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * Class Inbox
 * @package MyApp\Components\Tasks\Entities
 */
final class Inbox extends Task
{
    /**
     * @var EstimatedTime|null
     */
    protected $estimatedTime;

    /**
     * タスクの見積もり時間を設定する
     *
     * @param Estimatedtime $estimatedTime
     */
    public function estimateTime(Estimatedtime $estimatedTime): void
    {
        $this->estimatedTime = $estimatedTime;
    }
}
