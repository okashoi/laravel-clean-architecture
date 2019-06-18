<?php

namespace MyApp\Components\Tasks\Entities;

use Throwable;

/**
 * Class EstimatedTimeNotSet
 * @package MyApp\Components\Tasks\Entities
 */
class EstimatedTimeNotSet extends Exception
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
