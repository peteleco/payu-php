<?php namespace Peteleco\PayU\Commands\Queries;

use Peteleco\PayU\Support\CommandRequest;
use Peteleco\PayU\Support\Contracts\ICommandRequest;

class TransactionDetail extends CommandRequest implements ICommandRequest
{

    /**
     * @var string
     */
    protected $command = 'TRANSACTION_RESPONSE_DETAIL';

    /**
     * Request path
     *
     * @var string
     */
    protected $path = '/reports-api/4.0/service.cgi';

    /**
     * @param string $transactionId
     *
     * @return ResponseInterface
     *
     */
    public function request(string $transactionId = '')
    {
        return $this->post([
            'details' => [
                'transactionId' => $transactionId
            ]
        ]);
    }
}