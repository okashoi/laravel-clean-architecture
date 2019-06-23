<?php

namespace Tests\Components\Tasks\UseCases\CreateInbox;

use MyApp\Components\Tasks\Entities\{Id, Task};
use MyApp\Components\Tasks\UseCases\{TaskRepository, NotFoundException};

/**
 * Class InMemoryTaskRepository
 * @package Tests\Components\Tasks\UseCases\CrateInbox
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
