<?php namespace PayU\Tests\Commands\Payments;

use PayU\Commands\Payments\Ping;
use PayU\Support\Environment;
use PayU\Tests\TestCase;

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