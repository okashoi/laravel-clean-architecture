<?php

namespace MyApp\Components\CreateInbox\UseCase;

/**
 * Interface InputBoundary
 * @package MyApp\Components\CreateInbox\UseCase
 */
interface InputBoundary
{
    /**
     * @param InputData $input
     */
    public function __invoke(InputData $input): void;
}
