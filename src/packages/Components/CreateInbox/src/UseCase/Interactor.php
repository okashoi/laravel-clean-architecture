<?php

namespace MyApp\Components\CreateInbox\UseCase;

use MyApp\Entities\Task\{Inbox, Task, Name, Note};

/**
 * Class Interactor
 * @package MyApp\Components\CreateInbox\UseCase
 */
final class Interactor implements InputBoundary
{
    /**
     * @var IdProvider
     */
    private $idProvider;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    /**
     * @var NormalOutputBoundary
     */
    private $normalOutputBoundary;

    /**
     * Interactor constructor.
     * @param IdProvider $idProvider
     * @param TaskRepository $taskRepository
     * @param NormalOutputBoundary $normalOutputBoundary
     */
    public function __construct(IdProvider $idProvider, TaskRepository $taskRepository, NormalOutputBoundary $normalOutputBoundary)
    {
        $this->idProvider = $idProvider;
        $this->taskRepository = $taskRepository;
        $this->normalOutputBoundary = $normalOutputBoundary;
    }

    /**
     * @param InputData $input
     */
    public function __invoke(InputData $input): void
    {
        $inbox = $this->produceEntity($input);

        $this->taskRepository->save($inbox);

        $normalOutput = $this->produceNormalOutputData($inbox);

        ($this->normalOutputBoundary)($normalOutput);
    }

    /**
     * @param InputData $input
     * @return Task
     */
    private function produceEntity(InputData $input): Task
    {
        $inbox = new Inbox(
            $this->idProvider->provide(),
            new Name($input->name())
        );

        if ($input->hasNote()) {
            $note = new Note($input->note());
            $inbox->updateNote($note);
        }

        return $inbox;
    }

    /**
     * @param Task $inbox
     * @return NormalOutputData
     */
    private function produceNormalOutputData(Task $inbox): NormalOutputData
    {
        return new NormalOutputData(
            (string)($inbox->id()),
            $inbox->name()->value(),
            $inbox->note()->value()
        );
    }
}
