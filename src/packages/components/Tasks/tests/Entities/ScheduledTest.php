<?php

namespace Tests\Components\Tasks\Entities;

use Mockery;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use MyApp\Components\Tasks\Entities\{Id, Name, Note, Scheduled, EstimatedTime, StartDate, Completed};

/**
 * Class ScheduledTest
 * @package Tests\Components\Tasks\Entities
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
