<?php

namespace MyApp\Components\CreateInbox\UseCase;

use MyApp\Entities\Task\{Task, Id};

/**
 * Interface TaskRepository
 * @package MyApp\Components\CreateInbox\UseCase
 */
interface TaskRepository
{
    /**
     * 与えられたタスクを永続化する
     *
     * @param Task $task
     */
    public function save(Task $task): void;

    /**
     * 与えられたタスク ID によって識別されるタスクを再構築する
     *
     * @param Id $id
     * @return Task
     * @throws NotFoundException
     */
    public function findById(Id $id): Task;
}
