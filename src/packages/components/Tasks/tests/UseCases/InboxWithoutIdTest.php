<?php

namespace Tests\Components\Tasks\UseCases;

use PHPUnit\Framework\TestCase;
use MyApp\Components\Tasks\Entities\{Id, Name, Note};
use MyApp\Components\Tasks\UseCases\InboxWithoutId;

/**
 * Class InboxWithoutIdTest
 * @package Tests\Components\Tasks\UseCases
 */
class InboxWithoutIdTest extends TestCase
{
    /**
     * @test
     */
    public function testUpdateNote()
    {
        $name = new Name('test');
        $note = new Note('this is note');

        $inboxWithoutId = new InboxWithoutId($name);
        $inboxWithoutId->updateNote($note);

        $actual = $inboxWithoutId->note()->value();
        $this->assertSame('this is note', $actual);
    }

    /**
     * @test
     */
    public function testConvertToInbox()
    {
        $name = new Name('test');
        $note = new Note('this is note');

        $inboxWithoutId = new InboxWithoutId($name);
        $inboxWithoutId->updateNote($note);

        $id = new Id(1);
        $inbox = $inboxWithoutId->convertToInbox($id);

        $this->assertSame(1, $inbox->id()->value());
        $this->assertSame('test', $inbox->name()->value());
        $this->assertSame('this is note', $inbox->note()->value());
    }
}
