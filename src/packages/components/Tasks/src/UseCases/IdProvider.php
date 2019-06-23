<?php

namespace MyApp\Components\Tasks\UseCases;

use MyApp\Components\Tasks\Entities\Id;

/**
 * Interface IdProvider
 * @package MyApp\Components\Tasks\UseCases
 */
interface IdProvider
{
    /**
     * タスク ID を提供する
     * @return Id
     */
    public function provide(): Id;
}
