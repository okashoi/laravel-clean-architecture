<?php

namespace MyApp\Components\Tasks\UseCases\CreateInbox;

/**
 * Interface InputBoundary
 * @package MyApp\Components\Tasks\UseCases\CreateInbox
 */
interface InputBoundary
{
    /**
     * @param InputData $input
     */
    public function __invoke(InputData $input): void;
}
