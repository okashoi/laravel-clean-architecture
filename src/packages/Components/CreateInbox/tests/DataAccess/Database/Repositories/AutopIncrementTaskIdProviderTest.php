<?php

namespace MyApp\Components\CreateInbox\Tests\DataAccess\Database\Repositories;

use PHPUnit\Framework\TestCase;
use MyApp\Components\CreateInbox\DataAccess\Database\Repositories\AutoIncrementTaskIdProvider;

/**
 * Class AutoIncrementTaskIdProviderTest
 * @package MyApp\Components\CreateInbox\Tests\DataAccess\Database\Repositories
 */
class AutoIncrementTaskIdProviderTest extends TestCase
{
    /**
     * @test
     */
    public function testProvide()
    {
        $provider = new AutoIncrementTaskIdProvider();

        // NOTE: auto increment においては、最初の時点では必ず ID が未確定である
        $providedId = $provider->provide();
        $this->assertSame('', (string)$providedId);
    }
}
