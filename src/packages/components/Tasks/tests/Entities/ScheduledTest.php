<?php

namespace Tests\Components\Tasks\Entities;

use MyApp\Components\Tasks\Entities\Note;
use MyApp\Components\Tasks\Entities\Scheduled;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use MyApp\Components\Tasks\Entities\Id;
use MyApp\Components\Tasks\Entities\Name;
use MyApp\Components\Tasks\Entities\EstimatedTime;
use MyApp\Components\Tasks\Entities\StartDate;
use MyApp\Components\Tasks\Entities\Completed;

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
        $id = new Id(1);
        $name = new Name('test');
        $estimatedTime = new EstimatedTime(1, 0);
        $startDate = new StartDate(new DateTimeImmutable('tomorrow'));
        $note = new Note('this is note');
        $scheduled = new Scheduled($id, $name, $estimatedTime, $startDate, $note);

        $completed = $scheduled->convertToCompleted();
        $this->assertTrue($completed instanceof Completed);
    }
}
