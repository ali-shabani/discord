<?php


namespace Alish\Discord\Tests;


use Alish\Discord\Embed\Author;
use Alish\Discord\Embed\Embed;
use Alish\Discord\Embed\Field;
use Alish\Discord\Embed\Footer;
use Alish\Discord\WebhookMessage;
use Orchestra\Testbench\TestCase;

class SetPropertyText extends TestCase
{

    /**
     * @test
     */
    public function set_works_correctly()
    {
        $embed = Embed::title('alish')
                    ->type()
                    ->footer(Footer::text('footer'));

        $this->assertTrue($embed instanceof Embed);
        $this->assertArrayHasKey('title', $embed->toArray());
        $this->assertArrayHasKey('type', $embed->toArray());
    }

}
