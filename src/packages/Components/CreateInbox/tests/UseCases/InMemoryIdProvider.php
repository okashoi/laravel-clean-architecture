<?php

namespace MyApp\Components\CreateInbox\Tests\UseCase;

use MyApp\Entities\Task\Id;
use MyApp\Components\CreateInbox\UseCase\IdProvider;

/**
 * Class InMemoryIdProvider
 * @package MyApp\Components\CreateInbox\Tests\UseCase
 */
final class InMemoryIdProvider implements IdProvider
{
    /**
     * @var int
     */
    private $nextId;

    /**
     * DummyIdProvider constructor.
     * @param int $idValue
     */
    public function __construct()
    {
        $this->nextId = 1;
    }

    /**
     * タスク ID を提供する
     * @return Id
     */
    public function provide(): Id
    {
        return new InMemoryId($this->nextId++);
    }
}
