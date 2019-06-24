<?php

namespace MyApp\Database\Repositories;

use MyApp\Components\Tasks\Entities\{Id, Task, Inbox, Scheduled, Completed};
use MyApp\Components\Tasks\UseCases\{
    TaskRepository as TaskRepositoryInterface,
    NotFoundException
};
use MyApp\Database\Eloquents;
use MyApp\Database\{EntityUnidentifiedException, InvalidArgumentException};

/**
 * Class TaskRepository
 * @package MyApp\Database\Repositories
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * 与えられたタスクを永続化する
     *
     * @param Task $task
     * @throws NotFoundException
     * @throws InvalidArgumentException
     */
    public function save(Task $task): void
    {
        // TODO: 例外使うのが良くない形なのであとで直す
        try {
            /** @var AutoIncrementTaskId $id */
            $id = $task->id();
            $idValue = $id->value();
        } catch (EntityUnidentifiedException $e) {
            $taskRecord = Eloquents\Task::create([
                'name' => $task->name()->value(),
                'note' => $task->note()->value(),
            ]);

            $task->resetId(new AutoIncrementTaskId($taskRecord->id));

            return;
        }

        /** @var Eloquents\Task|null $taskRecord */
        $taskRecord = Eloquents\Task::find($idValue);
        if (is_null($task)) {
            throw new NotFoundException();
        }

        // TODO: 以下、 Open-Closed Principle に反しているので直したい
        if ((($task instanceof Inbox) && $task->hasEstimatedTime()) || $task instanceof Scheduled) {
            /** @var Inbox|Scheduled $task */
            $taskRecord->estimatedTime()->updateOrCreate([
                'hours' => $task->estimatedTime()->hours(),
                'minutes' => $task->estimatedTime()->minutes(),
            ]);
        }

        if ($task instanceof Scheduled) {
            /** @var Scheduled $task */
            $taskRecord->startDate()->updateOrCreate([
                'start_date' => $task->startDate()->value(),
            ]);
        }

        if ($task instanceof Completed) {
            /** @var Completed $task */
            $taskRecord->completed()->updateOrCreate([]);
        }
    }

    /**
     * 与えられたタスク ID によって識別されるタスクを再構築する
     *
     * @param Id $id
     * @return Task
     * @throws NotFoundException
     */
    public function findById(Id $id): Task
    {
        // TODO: Implement findById() method.
    }
}
