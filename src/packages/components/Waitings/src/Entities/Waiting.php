<?php

namespace MyApp\Components\Waitings\Entities;

/**
 * Class Waiting
 * @package MyApp\Components\Waitings\Entities
 */
final class Waiting
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
     * @param Id $id 連絡待ちID
     * @param Name $name 連絡待ち名
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

    /**
     * 連絡待ちを完了する
     * @return Completed
     */
    public function convertToCompleted(): Completed
    {
        return new Completed($this->id, $this->name, $this->note);
    }
}
