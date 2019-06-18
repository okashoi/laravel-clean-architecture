<?php

namespace Tests\Components\Tasks\Entities;

use PHPUnit\Framework\TestCase;
use DateTimeImmutable;
use MyApp\Components\Tasks\Entities\Id;
use MyApp\Components\Tasks\Entities\Name;
use MyApp\Components\Tasks\Entities\Inbox;
use MyApp\Components\Tasks\Entities\EstimatedTime;
use MyApp\Components\Tasks\Entities\StartDate;
use MyApp\Components\Tasks\Entities\Scheduled;

/**
 * Class InboxTest
 * @package Tests\Components\Tasks\Entities
 */
class InboxTest extends TestCase
{
    /**
     * @test
     */
    public function 「Inbox」は「見積もり時間」と「着手日」を設定すると「Scheduled」になること()
    {
        $id = new Id(1);
        $name = new Name('test');
        $inbox = new Inbox($id, $name);

        $estimatedTime = new EstimatedTime(1, 0);
        $inbox->estimateTime($estimatedTime);

        $startDate = new StartDate(new DateTimeImmutable('tomorrow'));

        $scheduled = $inbox->convertToScheduled($startDate);

        $this->assertTrue($scheduled instanceof Scheduled);
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function 「Inbox」に対して「着手日」が未設定のままでも「見積もり時間」を設定できること()
    {
        $id = new Id(1);
        $name = new Name('test');
        $inbox = new Inbox($id, $name);

        $estimatedTime = new EstimatedTime(1, 0);
        $inbox->estimateTime($estimatedTime);
    }

    /**
     * @test
     * @expectedException \MyApp\Components\Tasks\Entities\EstimatedTimeNotSet
     */
    public function 「Inbox」に対して「見積もり時間」が未設定のまま「着手日」を設定できないこと()
    {
        $id = new Id(1);
        $name = new Name('test');
        $inbox = new Inbox($id, $name);

        $startDate = new StartDate(new DateTimeImmutable('tomorrow'));

        $inbox->convertToScheduled($startDate);
    }

    /**
     * @test
     * @expectedException \MyApp\Components\Tasks\Entities\InvalidArgumentException
     */
    public function 「着手日」に過去の日付を能動的に設定できないこと()
    {
        $id = new Id(1);
        $name = new Name('test');
        $inbox = new Inbox($id, $name);

        $estimatedTime = new EstimatedTime(1, 0);
        $inbox->estimateTime($estimatedTime);

        $startDate = new StartDate(new DateTimeImmutable('yesterday'));

        $inbox->convertToScheduled($startDate);
    }
}