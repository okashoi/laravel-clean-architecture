<?php


namespace MyApp\Components\Tasks\Entities;

/**
 * Class Scheduled
 * @package MyApp\Components\Tasks\Entities
 */
final class Scheduled extends Task
{
    /**
     * @var EstimatedTime
     */
    protected $estimatedTime;

    /**
     * @var StartDate
     */
    protected $startDate;

    /**
     * Scheduled constructor.
     * @param Id $id
     * @param Name $name
     */
    public function __construct(Id $id, Name $name, EstimatedTime $estimatedTime, StartDate $startDate, Note $note)
    {
        parent::__construct($id, $name);

        $this->estimatedTime = $estimatedTime;
        $this->startDate = $startDate;
        $this->note = $note;
    }

    /**
     * タスクを完了する
     *
     * @return Completed
     */
    public function convertToCompleted(): Completed
    {
        return new Completed($this->id, $this->name, $this->note);
    }
}
