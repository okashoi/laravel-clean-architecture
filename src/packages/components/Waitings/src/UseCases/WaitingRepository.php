<?php

namespace MyApp\Components\Waitings\UseCases;

use MyApp\Components\Waitings\Entities\{Waiting, Id};

/**
 * Interface WaitingRepository
 * @package MyApp\Components\Waitings\UseCases
 */
interface WaitingRepository
{
    /**
     * 与えられた連絡待ちを永続化する
     *
     * @param Waiting $task
     */
    public function save(Waiting $task): void;

    /**
     * 与えられた連絡待ち ID によって識別される連絡待ちを再構築する
     *
     * @param Id $id
     * @return Waiting
     * @throws NotFoundException
     */
    public function findById(Id $id): Waiting;
}
