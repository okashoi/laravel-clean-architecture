<?php

namespace MyApp\Entities\Waiting;

/**
 * 連絡待ち名 Value Object
 * @package MyApp\Entities\Waiting
 */
final class Name
{
    /**
     * @var string
     */
    private $value;

    /**
     * Name constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
