<?php

namespace MyApp\Components\Waitings\Entities;

/**
 * Class Completed
 * @package MyApp\Components\Waitings\Entities
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
     * @param Id $id 連絡待ちID
     * @param Name $name 連絡待ち名
     * @param Note $note メモ
     */
    public function __construct(Id $id, Name $name, Note $note)
    {
        $this->id = $id;
        $this->name = $name;
        $this->note = $note;
    }
}
