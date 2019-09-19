<?php

namespace MyApp\Entities\Waiting;

/**
 * 連絡待ち ID Value Object
 * @package MyApp\Entities\Waiting
 */
final class Id
{
    /**
     * @var int
     */
    private $value;

    /**
     * Id constructor.
     * @param int $value
     * @throws InvalidArgumentException
     */
    public function __construct(int $value)
    {
        if ($value < 1) {
            throw new InvalidArgumentException('ID には正の整数を指定してください');
        }

        $this->value = $value;
    }
}
