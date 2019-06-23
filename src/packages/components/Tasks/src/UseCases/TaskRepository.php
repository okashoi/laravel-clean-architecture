<?php

namespace MyApp\Components\Tasks\UseCases;

use MyApp\Components\Tasks\Entities\{Task, Id};

/**
 * Interface TaskRepository
 * @package MyApp\Components\Tasks\UseCases
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
