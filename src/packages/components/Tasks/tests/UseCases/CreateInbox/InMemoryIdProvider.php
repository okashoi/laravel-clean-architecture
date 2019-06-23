<?php

namespace Tests\Components\Tasks\UseCases\CreateInbox;

use MyApp\Components\Tasks\Entities\Id;
use MyApp\Components\Tasks\Usecases\IdProvider;

/**
 * Class InMemoryIdProvider
 * @package Tests\Components\Tasks\UseCases\CreateInbox
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
