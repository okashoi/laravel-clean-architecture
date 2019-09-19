<?php

namespace MyApp\Entities\Task;

/**
 * Class Completed
 * @package MyApp\Entities\Task
 */
final class Completed extends Task
{
    /**
     * Completed constructor.
     * @param Id $id
     * @param Name $name
     * @param Note $note
     */
    public function __construct(Id $id, Name $name, Note $note)
    {
        parent::__construct($id, $name);
        $this->updateNote($note);
    }
}
