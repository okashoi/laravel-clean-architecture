<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * Class Completed
 * @package MyApp\Components\Tasks\Entities
 */
final class Completed
{
    /**
     * @var Id
     */
    protected $id;

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Note
     */
    protected $note;

    /**
     * Completed constructor.
     * @param Id $id
     * @param Name $name
     * @param Note $note
     */
    public function __construct(Id $id, Name $name, Note $note)
    {
        $this->id = $id;
        $this->name = $name;
        $this->note = $note;
    }
}
