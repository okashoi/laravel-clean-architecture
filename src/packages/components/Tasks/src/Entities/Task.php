<?php

namespace MyApp\Components\Tasks\Entities;

/**
 * Class Task
 * @package MyApp\Components\Tasks\Entities
 */
abstract class Task
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
     * @param Id $id タスクID
     * @param Name $name タスク名
     */
    public function __construct(Id $id, Name $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->note = new Note('');
    }

    /**
     * メモを更新する
     *
     * @param Note $note
     */
    final public function updateNote(Note $note): void
    {
        $this->note = $note;
    }
}
