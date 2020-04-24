<?php

namespace Alish\Discord\Tests;

use Orchestra\Testbench\TestCase;
use Alish\Discord\DiscordServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [DiscordServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
