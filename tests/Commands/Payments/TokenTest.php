<?php namespace PayU\Tests\Commands\Payments;

use PayU\Commands\Payments\Token;
use PayU\Models\CreditCardToken;
use PayU\Tests\TestCase;

class TokenTest extends TestCase
{

    public function test_request()
    {
        $token    = new Token($this->environment);
        $response = $token->request(new CreditCardToken([
            'payerId'              => 10,
            'name'                 => 'Nome completo',
            'identificationNumber' => '121231231',
            'paymentMethod'        => 'VISA',
            'number'               => '4082061556622228',
            'expirationDate'       => '2022/01'
        ]));

        $response = \GuzzleHttp\json_decode($response->getBody()->getContents());

        $this->assertObjectHasAttribute('code', $response);
        $this->assertEquals($response->code, 'SUCCESS');
        $this->assertObjectHasAttribute('creditCardToken', $response);
    }
}