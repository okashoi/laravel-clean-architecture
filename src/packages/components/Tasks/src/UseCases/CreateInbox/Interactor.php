<?php

namespace MyApp\Components\Tasks\UseCases\CreateInbox;

use MyApp\Components\Tasks\Entities\{Task, Name, Note};
use MyApp\Components\Tasks\UseCases\{InboxWithoutId, TaskRepository};

/**
 * Class Interactor
 * @package MyApp\Components\Tasks\UseCases\CreateInbox
 */
final class Interactor implements InputBoundary
{
    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @var NormalOutputBoundary
     */
    private $normalOutputBoundary;

    public function __construct(TaskRepository $taskRepository, NormalOutputBoundary $normalOutputBoundary)
    {
        $this->taskRepository = $taskRepository;
        $this->normalOutputBoundary = $normalOutputBoundary;
    }

    /**
     * @param InputData $input
     */
    public function __invoke(InputData $input): void
    {
        $inboxWithoutId = $this->produceEntity($input);

        $inbox = $this->taskRepository->create($inboxWithoutId);

        $normalOutput = $this->produceNormalOutputData($inbox);

        ($this->normalOutputBoundary)($normalOutput);
    }

    /**
     * @param InputData $input
     * @return InboxWithoutId
     */
    private function produceEntity(InputData $input): InboxWithoutId
    {
        $inboxWithoutId = new InboxWithoutId(
            new Name($input->name())
        );

        if ($input->hasNote()) {
            $note = new Note($input->note());
            $inboxWithoutId->updateNote($note);
        }

        return $inboxWithoutId;
    }

    /**
     * @param Task $inbox
     * @return NormalOutputData
     */
    private function produceNormalOutputData(Task $inbox): NormalOutputData
    {
        return new NormalOutputData(
            $inbox->id()->value(),
            $inbox->name()->value(),
            $inbox->note()->value()
        );
    }
}
