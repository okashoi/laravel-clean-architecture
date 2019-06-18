<?php

namespace Tests\Components\Waitings\Entities;

use PHPUnit\Framework\TestCase;
use MyApp\Components\Waitings\Entities\Id;
use MyApp\Components\Waitings\Entities\Name;
use MyApp\Components\Waitings\Entities\Waiting;
use MyApp\Components\Waitings\Entities\Note;
use MyApp\Components\Waitings\Entities\Completed;

/**
 * Class WaitingTest
 * @package Tests\Components\Waitings\Entities
 */
class WaitingTest extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function 「連絡待ち」は必ず「連絡待ちID」「連絡ち待ち名」を持つ()
    {
        $id = new Id(1);
        $name = new Name('test');

        new Waiting($id, $name);
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function 「連絡待ち」は任意で「メモ」を持てる()
    {
        $id = new Id(1);
        $name = new Name('test');
        $waiting = new Waiting($id, $name);

        $note = new Note('this is note');
        $waiting->updateNote($note);
    }

    /**
     * @test
     */
    public function 「連絡待ち」は「完了」できる()
    {
        $id = new Id(1);
        $name = new Name('test');
        $waiting = new Waiting($id, $name);

        $completed = $waiting->convertToCompleted();
        $this->assertTrue($completed instanceof Completed);
    }
}
