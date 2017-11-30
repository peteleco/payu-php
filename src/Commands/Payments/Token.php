<?php namespace Peteleco\PayU\Commands\Payments;

use Peteleco\PayU\Models\CreditCardToken;
use Peteleco\PayU\Support\CommandRequest;
use Peteleco\PayU\Support\Contracts\ICommandRequest;

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
     * @return mixed
     */
    public function request(CreditCardToken $creditCardToken)
    {
        return $this->post([
            'creditCardToken' => $creditCardToken->toApi()
        ]);
    }
}