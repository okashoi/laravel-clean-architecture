<?php

namespace MyApp\Components\CreateInbox\Tests\UseCase;

use Mockery;
use PHPUnit\Framework\TestCase;
use MyApp\Components\CreateInbox\UseCase\{Interactor, InputData, NormalOutputBoundary};

/**
 * Class InteractorTest
 * @package MyApp\Components\CreateInbox\Tests\UseCase
 */
class InteractorTest extends TestCase
{
    /**
     * @test
     */
    public function testInvoke()
    {
        $idProvider = new InMemoryIdProvider();
        $taskRepository = new InMemoryTaskRepository();

        $normalOutputBoundary = Mockery::mock(NormalOutputBoundary::class);
        $normalOutputBoundary->shouldReceive('__invoke');

        $input = new InputData('test', 'this is note');

        (new Interactor($idProvider, $taskRepository, $normalOutputBoundary))($input);

        $inbox = $taskRepository->findById(new InMemoryId(1));

        $this->assertSame('test', $inbox->name()->value());
        $this->assertSame('this is note', $inbox->note()->value());
    }
}
