<?php

namespace MyApp\Components\Tasks\UseCases\CreateInbox;

use MyApp\Components\Tasks\Entities\{Inbox, Id, Name, Note};
use Myapp\Components\Tasks\UseCases\TaskRepository;

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
        $inbox = $this->produceEntity($input);

        $this->taskRepository->save($inbox);

        $normalOutput = $this->produceNormalOutputData($inbox);

        ($this->normalOutputBoundary)($normalOutput);
    }

    /**
     * @param InputData $input
     * @return Inbox
     */
    private function produceEntity(InputData $input): Inbox
    {
        $inbox = new Inbox(
            new Id(1), // TODO: ID が未確定でインスタンス化できる仕組み
            new Name($input->name())
        );

        if ($input->hasNote()) {
            $note = new Note($input->note());
            $inbox->updateNote($note);
        }

        return $inbox;
    }

    /**
     * @param Inbox $inbox
     * @return NormalOutputData
     */
    private function produceNormalOutputData(Inbox $inbox): NormalOutputData
    {
        return new NormalOutputData(
            $inbox->id()->value(),
            $inbox->name()->value(),
            $inbox->note()->value()
        );
    }
}
