<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * タスク ID Value Object
 * @package MyApp\Components\Tasks\Entities
 */
interface Id
{
    /**
     * @param Id $another
     * @return bool
     */
    public function equals(Id $another): bool;

    /**
     * @return string
     */
    public function __toString(): string;
}
