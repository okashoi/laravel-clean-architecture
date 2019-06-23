<?php

namespace MyApp\Components\Tasks\UseCases\CreateInbox;

/**
 * Class InputData
 * @package MyApp\Components\Tasks\UseCases\CreateInbox
 */
final class InputData
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $note;

    /**
     * InputData constructor.
     * @param string $name
     * @param string $note
     */
    public function __construct(string $name, string $note)
    {
        $this->name = trim($name);
        $this->note = trim($note);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function note(): string
    {
        return $this->note;
    }

    /**
     * @return bool
     */
    public function hasNote(): bool
    {
        return $this->note !== '';
    }
}
