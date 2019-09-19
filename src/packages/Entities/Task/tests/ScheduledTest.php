<?php

namespace MyApp\Entities\Task\Tests;

use Mockery;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use MyApp\Entities\Task\{Id, Name, Note, Scheduled, StartDate, Completed, EstimatedTime};

/**
 * Class ScheduledTest
 * @package Tests\Entities\Task
 */
class ScheduledTest extends TestCase
{
    /**
     * @test
     */
    public function 「Scheduled」は「完了」できること()
    {
        $id = Mockery::mock(Id::class);
        $name = new Name('test');
        $estimatedTime = new EstimatedTime(1, 0);
        $startDate = new StartDate(new DateTimeImmutable('tomorrow'));
        $note = new Note('this is note');
        $scheduled = new Scheduled($id, $name, $estimatedTime, $startDate, $note);

        $completed = $scheduled->convertToCompleted();
        $this->assertTrue($completed instanceof Completed);
    }
}
