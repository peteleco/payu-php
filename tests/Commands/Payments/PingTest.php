<?php namespace Peteleco\PayU\Tests\Commands\Payments;

use Peteleco\PayU\Commands\Payments\Ping;
use Peteleco\PayU\Tests\TestCase;

/**
 * Todo: implement negative tests
 * Class PingTest
 *
 * @package Peteleco\PayU\Tests\Commands\Payments
 */
class PingTest extends TestCase
{

    /**
     * @test
     */
    public function test_request()
    {

        $ping = new Ping($this->environment);

        $response = $ping->request();

        $this->assertObjectHasAttribute('code', $response);
        $this->assertEquals('SUCCESS', $response->code);
    }
}