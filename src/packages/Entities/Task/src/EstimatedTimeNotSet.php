<?php

namespace MyApp\Entities\Task;

use Throwable;

/**
 * Class EstimatedTimeNotSet
 * @package MyApp\Entities\Task
 */
final class EstimatedTimeNotSet extends Exception
{
    /**
     * EstimatedTimeNotSet constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = '先に見積もり時間を設定してください', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
