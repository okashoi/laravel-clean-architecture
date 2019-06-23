<?php

namespace MyApp\Database\Repositories;

use MyApp\Components\Tasks\Entities\Id;
use MyApp\Components\Tasks\UseCases\IdProvider;

/**
 * Class AutoIncrementTaskIdProvider
 * @package MyApp\Database\Repositories
 */
class AutoIncrementTaskIdProvider implements IdProvider
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
