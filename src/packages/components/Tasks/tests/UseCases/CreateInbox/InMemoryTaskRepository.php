<?php

namespace Tests\Components\Tasks\UseCases\CreateInbox;

use MyApp\Components\Tasks\Entities\{Id, Inbox, Task, InvalidArgumentException};
use MyApp\Components\Tasks\UseCases\{InboxWithoutId, TaskRepository, NotFoundException};

/**
 * Class InMemoryTaskRepository
 * @package Tests\Components\Tasks\UseCases\CrateInbox
 */
final class InMemoryTaskRepository implements TaskRepository
{
    /**
     * @var int
     */
    private $nextId;

    /**
     * @var array[Task]
     */
    private $tasks;

    /**
     * InMemoryTaskRepository constructor.
     */
    public function __construct()
    {
        $this->nextId = 1;
        $this->tasks = [];
    }

    /**
     * @param InboxWithoutId $task
     * @return Inbox
     * @throws InvalidArgumentException
     */
    public function create(InboxWithoutId $task): Inbox
    {
        $id = new Id($this->nextId);
        $inbox = new Inbox($id, $task->name());
        $inbox->updateNote($task->note());

        $this->tasks[$this->nextId] = $inbox;
        $this->nextId++;

        return $inbox;
    }

    /**
     * @param Task $task
     */
    public function save(Task $task): void
    {
        $this->tasks[$task->id()->value()] = $task;
    }

    /**
     * @param Id $id
     * @return Task
     * @throws NotFoundException
     */
    public function findById(Id $id): Task
    {
        if (!isset($this->tasks[$id->value()])) {
            throw new NotFoundException();
        }

        return $this->tasks[$id->value()];
    }
}
