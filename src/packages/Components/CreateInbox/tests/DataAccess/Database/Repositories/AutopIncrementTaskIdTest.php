<?php

namespace MyApp\Components\CreateInbox\DataAccess\Database\Repositories;

use PHPUnit\Framework\TestCase;
use MyApp\Components\CreateInbox\DataAccess\Database\Repositories\AutoIncrementTaskId;

/**
 * Class AutoIncrementTaskIdTest
 * @package MyApp\Components\CreateInbox\DataAccess\Database\Repositories
 */
class AutoIncrementTaskIdTest extends TestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function testConstruct()
    {
        new AutoIncrementTaskId(1);
        new AutoIncrementTaskId(null);
    }

    /**
     * @test
     * @expectedException \MyApp\Database\InvalidArgumentException
     */
    public function コンスタラクタ引数に0を渡すとInvalidArgumentExceptionを送出すること()
    {
        new AutoIncrementTaskId(0);
    }

    /**
     * @test
     * @expectedException \MyApp\Database\InvalidArgumentException
     */
    public function コンスタラクタ引数に負の整数を渡すとInvalidArgumentExceptionを送出すること()
    {
        new AutoIncrementTaskId(-1);
    }

    /**
     * @test
     */
    public function testEquals()
    {
        $one = new AutoIncrementTaskId(1);
        $another = new AutoIncrementTaskId(1);

        $this->assertTrue($one->equals($another));

        $one = new AutoIncrementTaskId(1);
        $another = new AutoIncrementTaskId(2);

        $this->assertFalse($one->equals($another));
    }

    /**
     * @test
     * @expectedException \MyApp\Database\EntityUnidentifiedException
     */
    public function ID未設定の状態で値にアクセスしようとするとEntityUnidentifiedExceptionを送出すること()
    {
        $id = new AutoIncrementTaskId(null);
        $id->value();
    }

    /**
     * @test
     * @expectedException \MyApp\Database\EntityUnidentifiedException
     */
    public function ID未設定の状態で比較しようとするとEntityUnidentifiedExceptionを送出すること()
    {
        $one = new AutoIncrementTaskId(null);
        $another = new AutoIncrementTaskId(1);

        $one->equals($another);
    }

    /**
     * @test
     */
    public function testToString()
    {
        $id = new AutoIncrementTaskId(1);
        $this->assertSame('1', (string)$id);

        $id = new AutoIncrementTaskId(null);
        $this->assertSame('', (string)$id);
    }
}
