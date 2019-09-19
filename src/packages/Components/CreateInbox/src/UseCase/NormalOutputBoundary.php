<?php

namespace MyApp\Components\CreateInbox\UseCase;

/**
 * Interface NormalOutputBoundary
 * @package MyApp\Components\CreateInbox\UseCase
 */
interface NormalOutputBoundary
{
    /**
     * @param NormalOutputData $output
     */
    public function __invoke(NormalOutputData $output): void;
}
