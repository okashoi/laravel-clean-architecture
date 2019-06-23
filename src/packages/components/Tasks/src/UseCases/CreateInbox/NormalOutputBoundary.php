<?php

namespace MyApp\Components\Tasks\UseCases\CreateInbox;

/**
 * Interface NormalOutputBoundary
 * @package MyApp\Components\Tasks\UseCases\CreateInbox
 */
interface NormalOutputBoundary
{
    /**
     * @param NormalOutputData $output
     */
    public function __invoke(NormalOutputData $output): void;
}
