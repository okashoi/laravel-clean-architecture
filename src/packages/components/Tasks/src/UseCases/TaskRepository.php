<?php

namespace MyApp\Components\Tasks\UseCases;

use MyApp\Components\Tasks\Entities\{Task, Inbox, Id};

/**
 * Interface TaskRepository
 * @package MyApp\Components\Tasks\UseCases
 */
interface TaskRepository
{
    /**
     * 与えられたタスク（識別子なし）を新しく永続化する
     *
     * @param InboxWithoutId $task
     * @return Task
     */
    public function create(InboxWithoutId $task): Inbox;

    /**
     * 与えられたタスクを更新する
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
