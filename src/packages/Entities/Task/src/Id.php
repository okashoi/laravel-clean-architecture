<?php

namespace MyApp\Entities\Task;

/**
 * タスク ID Value Object
 * @package MyApp\Entities\Task
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
