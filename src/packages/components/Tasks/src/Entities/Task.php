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

    /**
     * @return Id
     */
    final public function id(): Id
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    final public function name(): Name
    {
        return $this->name;
    }

    /**
     * @return Note
     */
    final public function note(): Note
    {
        return $this->note;
    }

    /**
     * タスクエンティティの同一性を判定
     * @param self $another
     * @return bool
     */
    final public function isIdenticalTo(self $another): bool
    {
        return $this->id->equals($another->id());
    }
}
