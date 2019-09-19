<?php

namespace MyApp\Components\CreateInbox\DataAccess\Database\Repositories;

use MyApp\Entities\Task\Id;
use MyApp\Components\CreateInbox\UseCase\IdProvider;

/**
 * Class AutoIncrementTaskIdProvider
 * @package MyApp\Components\CreateInbox\DataAccess\Database\Repositories
 */
final class AutoIncrementTaskIdProvider implements IdProvider
{
    /**
     * タスク ID を供給する
     * @return Id
     */
    public function provide(): Id
    {
        // NOTE: auto increment においては、最初の時点では必ず ID が未確定である点に留意
        return new AutoIncrementTaskId(null);
    }
}
