<?php

namespace MyApp\Components\Tasks\UseCases;

use MyApp\Components\Tasks\Entities\{Inbox, Id, Name, Note};

/**
 * Class InboxWithoutId
 * @package MyApp\Components\Tasks\UseCases
 */
final class InboxWithoutId
{
    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Note
     */
    protected $note;

    /**
     * TaskWithoutId constructor.
     * @param Name $name タスク名
     */
    public function __construct(Name $name)
    {
        $this->name = $name;
        $this->note = new Note('');
    }


    /**
     * メモを更新する
     *
     * @param Note $note
     */
    public function updateNote(Note $note): void
    {
        $this->note = $note;
    }

    /**
     * @return Name
     */
    public function name(): Name
    {
        return $this->name;
    }

    /**
     * @return Note
     */
    public function note(): Note
    {
        return $this->note;
    }

    /**
     * タスク ID を与えて Inbox に変換する
     *
     * @param Id $id タスク ID
     * @return Inbox
     */
    public function convertToInbox(Id $id): Inbox
    {
        $inbox = new Inbox($id, $this->name);
        $inbox->updateNote($this->note);

        return $inbox;
    }
}
