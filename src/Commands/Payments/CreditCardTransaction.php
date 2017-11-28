<?php namespace PayU\Commands\Payments;

use PayU\Models\Transaction;
use PayU\Support\CommandRequest;
use PayU\Support\Contracts\ICommandRequest;
use Psr\Http\Message\ResponseInterface;

/**
 * Class CreditCardTransaction
 *
 * @package PayU\Commands\Payments
 */
class CreditCardTransaction extends CommandRequest implements ICommandRequest
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

    // AUTHORIZATION_AND_CAPTURE

    /**
     * @param Transaction $transaction
     *
     * @return ResponseInterface
     */
    public function request(Transaction $transaction): ResponseInterface
    {
        return $this->post([
            'transaction' => $transaction->toApi()
        ]);
    }
}