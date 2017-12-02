<?php namespace Peteleco\PayU\Commands\Payments;

use Peteleco\PayU\Support\CommandRequest;
use Peteleco\PayU\Support\Contracts\ICommandRequest;

class CancelCreditCardTransaction extends CommandRequest implements ICommandRequest
{

    /**
     * @var string
     */
    protected $command = 'SUBMIT_TRANSACTION';

    /**
     * Request path
     *
     * @var string
     */
    protected $path = '/payments-api/4.0/service.cgi';

    public function request($transactionId, $orderId)
    {
        return $this->post([
            'transaction' => [
                'order'               => [
                    'id' => $orderId
                ],
                'type'                => 'VOID',
                'parentTransactionId' => $transactionId
            ]
        ]);
    }
}