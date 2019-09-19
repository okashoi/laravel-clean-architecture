<?php

namespace MyApp\Components\CreateInbox\UseCase;

use MyApp\Entities\Task\Id;

/**
 * Interface IdProvider
 * @package MyApp\Components\CreateInbox\UseCase
 */
interface IdProvider
{
    /**
     * タスク ID を提供する
     * @return Id
     */
    public function provide(): Id;
}
