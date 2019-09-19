<?php

namespace MyApp\Components\CreateInbox\DataAccess\Database\Repositories;

use MyApp\Entities\Task\{Id, Name, Note, EstimatedTime, StartDate, Task, Inbox, Scheduled, Completed};
use MyApp\Components\CreateInbox\UseCase\{
    TaskRepository as TaskRepositoryInterface,
    NotFoundException
};
use MyApp\Components\CreateInbox\DataAccess\Database\Eloquents;
use MyApp\Components\CreateInbox\DataAccess\Database\{EntityUnidentifiedException, InvalidArgumentException};

/**
 * Class TaskRepository
 * @package MyApp\Components\CreateInbox\DataAccess\Database\Repositories
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
        if (is_null($taskRecord)) {
            // TODO: 現象としては「Inbox から始まっていない」ことなので違う例外か
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
     * @throws InvalidArgumentException
     * @throws NotFoundException
     * @throws EntityUnidentifiedException
     */
    public function findById(Id $id): Task
    {
        if (!$id instanceof AutoIncrementTaskId) {
            throw new InvalidArgumentException('AutoIncrementTaskId を渡してください');
        }
        /** @var AutoIncrementTaskId $id */
        /** @var Eloquents\Task|null $taskRecord */
        $taskRecord = Eloquents\Task::find($id->value());
        if (is_null($taskRecord)) {
            throw new NotFoundException();
        }

        // TODO: 以下、 Open-Closed Principle に反しているので直したい
        if (is_null($taskRecord->startDate)) {
            $task = new Inbox($id, new Name($taskRecord->name));

            $task->updateNote(new Note($taskRecord->note ?? ''));

            if (!is_null($taskRecord->estimatedTime)) {
                $estimatedTime = new EstimatedTime($taskRecord->estimatedTime->hours, $taskRecord->estimatedTime->minutes);
                $task->setEstimatedTime($estimatedTime);
            }

            return $task;
        }

        if (is_null($taskRecord->completed)) {
            $name = new Name($taskRecord->name);
            $estimatedTime = new EstimatedTime($taskRecord->estimatedTime->hours, $taskRecord->estimatedTime->minutes);
            $startDate = new StartDate($taskRecord->startDate->start_date);
            $note = new Note($taskRecord->note ?? '');

            return new Scheduled($id, $name, $estimatedTime, $startDate, $note);
        }

        return new Completed($id, new Name($taskRecord->name), new Note($taskRecord->note ?? ''));
    }
}
