<?php

namespace MyApp\Entities\Waiting;

/**
 * メモ Value Object
 * @package MyApp\Entities\Waiting
 */
final class Note
{
    /**
     * @var string
     */
    private $value;

    /**
     * Note constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
