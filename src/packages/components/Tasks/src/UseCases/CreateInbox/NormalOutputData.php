<?php

namespace MyApp\Components\Tasks\UseCases\CreateInbox;

/**
 * Class NormalOutputData
 * @package MyApp\Components\Tasks\UseCases\CreateInbox
 */
final class NormalOutputData
{
    /**
     * @var int
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
     * @param int $taskId
     * @param string $taskName
     * @param string $taskNote
     */
    public function __construct(int $taskId, string $taskName, string $taskNote)
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->taskNote = $taskNote;
    }

    /**
     * @return int
     */
    public function taskId(): int
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
