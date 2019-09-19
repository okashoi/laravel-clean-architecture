<?php

namespace MyApp\Entities\Waiting\Tests;

use PHPUnit\Framework\TestCase;
use MyApp\Entities\Waiting\Id;
use MyApp\Entities\Waiting\Name;
use MyApp\Entities\Waiting\Waiting;
use MyApp\Entities\Waiting\Note;
use MyApp\Entities\Waiting\Completed;

/**
 * Class WaitingTest
 * @package MyApp\Entities\Waitings\Tests
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
