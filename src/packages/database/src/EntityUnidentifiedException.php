<?php

namespace MyApp\Database;

use Throwable;

/**
 * Class EntityUnidentifiedException
 * @package MyApp\Database
 */
class EntityUnidentifiedException extends Exception
{
    /**
     * EntityUnidentifiedException constructor.
     *
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @see \Exception::__construct()
     *
     */
    public function __construct($message = '先に DB に保存して ID を確定させてください', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
