<?php

namespace MyApp\Components\CreateInbox\UseCase;

/**
 * Class NormalOutputData
 * @package MyApp\Components\CreateInbox\UseCase
 */
final class NormalOutputData
{
    /**
     * @var string
     */
    private $taskId;

    /**
     * @var string
     */
    private $taskName;

    /**
     * @var string
     */
    private $taskNote;

    /**
     * NormalOutputData constructor.
     * @param string $taskId
     * @param string $taskName
     * @param string $taskNote
     */
    public function __construct(string $taskId, string $taskName, string $taskNote)
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskNote = $taskNote;
    }

    /**
     * @return string
     */
    public function taskId(): string
    {
        return $this->taskId;
    }

    /**
     * @return string
     */
    public function taskName(): string
    {
        return $this->taskName;
    }

    /**
     * @return string
     */
    public function taskNote(): string
    {
        return $this->taskNote;
    }
}
