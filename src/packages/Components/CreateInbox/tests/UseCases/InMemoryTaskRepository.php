<?php

namespace MyApp\Components\CreateInbox\Tests\UseCase;

use MyApp\Entities\Task\{Id, Task};
use MyApp\Components\CreateInbox\UseCase\{TaskRepository, NotFoundException};

/**
 * Class InMemoryTaskRepository
 * @package MyApp\Components\CreateInbox\Tests\UseCase
 */
final class InMemoryTaskRepository implements TaskRepository
{
    /**
     * @var array[Task]
     */
    private $tasks;

    /**
     * InMemoryTaskRepository constructor.
     */
    public function __construct()
    {
        $this->tasks = [];
    }

    /**
     * @param Task $task
     */
    public function save(Task $task): void
    {
        $this->tasks[(string)$task->id()] = $task;
    }

    /**
     * @param Id $id
     * @return Task
     * @throws NotFoundException
     */
    public function findById(Id $id): Task
    {
        if (!isset($this->tasks[(string)$id])) {
            throw new NotFoundException();
        }

        return $this->tasks[(string)$id];
    }
}
