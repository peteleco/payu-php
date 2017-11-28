<?php namespace PayU\Commands\Payments;

use PayU\Models\CreditCardToken;
use PayU\Support\CommandRequest;
use PayU\Support\Contracts\ICommandRequest;
use Psr\Http\Message\ResponseInterface;

class Token extends CommandRequest implements ICommandRequest
{

    /**
     * @var string
     */
    protected $command = 'CREATE_TOKEN';

    /**
     * Request path
     *
     * @var string
     */
    protected $path = '/payments-api/4.0/service.cgi';

    /**
     * @param CreditCardToken $creditCardToken
     *
     * @return ResponseInterface
     *
     */
    public function request(CreditCardToken $creditCardToken): ResponseInterface
    {
        return $this->post([
            'creditCardToken' => $creditCardToken->toApi()
        ]);
    }
}