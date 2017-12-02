<?php namespace Peteleco\PayU\Tests\Commands\Payments;

use Peteleco\PayU\Commands\Payments\CancelCreditCardTransaction;
use Peteleco\PayU\Commands\Payments\CreditCardTransaction;
use Peteleco\PayU\Models\AdditionalValues;
use Peteleco\PayU\Models\Buyer;
use Peteleco\PayU\Models\Order;
use Peteleco\PayU\Models\Transaction;
use Peteleco\PayU\Tests\TestCase;

class CancelCreditCardTransactionTest extends TestCase
{

    public function test_cancel_pending_transaction()
    {
        $pendingTransaction = $this->generatePendingTransaction();

        $cancelTransaction = new CancelCreditCardTransaction($this->environment);
        $cancelResponse = $cancelTransaction->request(
            $pendingTransaction->transactionResponse->transactionId,
            $pendingTransaction->transactionResponse->orderId
        );

        var_dump($cancelResponse);
    }

    public function generatePendingTransaction()
    {
        $value           = 255.53;
        $creditCardToken = $this->generateCreditCardToken('PENDING');

        $creditCardTransaction = new CreditCardTransaction($this->environment);

        $transaction = new Transaction([
            'creditCardTokenId' => $creditCardToken->creditCardTokenId,
            'paymentMethod'     => $creditCardToken->paymentMethod,
            'paymentCountry'    => 'BR',
            'ipAddress'         => '127.0.0.0'
        ]);

        $buyer = new Buyer([
            'merchantBuyerId' => '10',
            'fullName'        => 'PENDING',
            'emailAddress'    => 'email@gmail.com',
            'contactPhone'    => '21 97190-9202',
            'dniNumber'       => '811.807.405-64',
        ]);

        $additionalValues = new AdditionalValues([
            'value'    => $value,
            'currency' => 'BRL'
        ]);

        $order = new Order([
            'accountId'     => $this->environment->getAccountId(), // '512327', // Brasil
            'referenceCode' => 'order_id_00000001',
            'signature'     => $creditCardTransaction->signature('order_id_00000001', $value, 'BRL'),
            'description'   => 'Teste de compra',
            'language'      => 'pt',
        ]);
        $order->setBuyer($buyer);
        $order->setAdditionalValues($additionalValues);

        $transaction->setOrder($order);

        $response = $creditCardTransaction->request($transaction);

        return $response;
    }
}