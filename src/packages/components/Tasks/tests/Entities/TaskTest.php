<?php

namespace Tests\Components\Tasks\Entities;

use PHPUnit\Framework\TestCase;
use MyApp\Components\Tasks\Entities\Task;
use MyApp\Components\Tasks\Entities\Id;
use MyApp\Components\Tasks\Entities\Name;
use MyApp\Components\Tasks\Entities\Note;

/**
 * Class TaskTest
 * @package Tests\Components\Tasks\Entities
 */
class TaskTest extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function 「タスク」は必ず「タスクID」「タスク名」を持つ()
    {
        $id = new Id(1);
        $name = new Name('test');
        new class($id, $name) extends Task{};
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function 「タスク」は任意で「メモ」を持てる()
    {
        $id = new Id(1);
        $name = new Name('test');
        $task = new class($id, $name) extends Task{};

        $note = new Note('this is note');
        $task->updateNote($note);
    }
}
