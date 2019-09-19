<?php

namespace MyApp\Components\CreateInbox\Tests\UseCase;

use PHPUnit\Framework\TestCase;
use MyApp\Components\CreateInbox\UseCase\InputData;

/**
 * Class InputDataTest
 * @package MyApp\Components\CreateInbox\Tests\UseCase
 */
class InputDataTest extends TestCase
{
    /**
     * @test
     */
    public function 「タスク名」の先頭の空白文字は取り除かれること()
    {
        $input = new InputData(' test', 'this is note');
        $this->assertSame('test', $input->name());

        $input = new InputData("\ttest", 'this is note');
        $this->assertSame('test', $input->name());
    }

    /**
     * @test
     */
    public function 「タスク名」の末尾の空白文字は取り除かれること()
    {
        $input = new InputData('test ', 'this is note');
        $this->assertSame('test', $input->name());

        $input = new InputData("test\t", 'this is note');
        $this->assertSame('test', $input->name());
    }

    /**
     * @test
     */
    public function 「メモ」の先頭の空白文字は取り除かれること()
    {
        $input = new InputData('test', ' this is note');
        $this->assertSame('this is note', $input->note());

        $input = new InputData('test', "\tthis is note");
        $this->assertSame('this is note', $input->note());
    }

    /**
     * @test
     */
    public function 「メモ」の末尾の空白文字は取り除かれること()
    {
        $input = new InputData('test', 'this is note ');
        $this->assertSame('this is note', $input->note());

        $input = new InputData('test', "this is note\t");
        $this->assertSame('this is note', $input->note());
    }

    /**
     * @test
     */
    public function testHasNote()
    {
        $inputWithNote = new InputData('test', 'this is note');
        $this->assertTrue($inputWithNote->hasNote());

        $inputWithoutNote = new InputData('test', '');
        $this->assertFalse($inputWithoutNote->hasNote());
    }
}
