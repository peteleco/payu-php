<?php namespace Peteleco\PayU\Tests\Commands\Payments;

use Peteleco\PayU\Commands\Payments\Ping;
use Peteleco\PayU\Tests\TestCase;

class PingTest extends TestCase
{

    /**
     * @test
     */
    public function test_request()
    {

        $ping = new Ping($this->environment);

        $response = $ping->request();
        $this->assertEquals('{"code":"SUCCESS","error":null,"transactionResponse":null}',
            $response->getBody()->getContents());

    }
}