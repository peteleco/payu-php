<?php namespace Peteleco\PayU\Tests\Commands\Payments;

use Peteleco\PayU\Commands\Payments\CreditCardTransaction;
use Peteleco\PayU\Commands\Payments\Token;
use Peteleco\PayU\Models\AdditionalValues;
use Peteleco\PayU\Models\Buyer;
use Peteleco\PayU\Models\CreditCardToken;
use Peteleco\PayU\Models\Order;
use Peteleco\PayU\Models\Transaction;
use Peteleco\PayU\Tests\TestCase;

class CreditCardTransactionTest extends TestCase
{

    public function test_request()
    {
        $value           = 255.53;
        $creditCardToken = $this->generateCreditCardToken();

        $creditCardTransaction = new CreditCardTransaction($this->environment);

        $transaction = new Transaction([
            'creditCardTokenId' => $creditCardToken->creditCardTokenId,
            'paymentMethod'     => $creditCardToken->paymentMethod,
            'paymentCountry'    => 'BR',
            'ipAddress'         => '127.0.0.0'
        ]);

        $buyer = new Buyer([
            'merchantBuyerId' => '10',
            'fullName'        => 'Nome completo',
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

        $this->assertEquals($response->code, 'SUCCESS');
        $this->assertEquals($response->transactionResponse->state, 'APPROVED');
    }

    public function generateCreditCardToken()
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

        return $response->creditCardToken;
    }
    /*
        order
        order->additionalValues[TX_VALUE]
        order->buyer
        order->buyer->shippingAddress
        creditCardTokenId
     "transaction": {
      "order": {
         "accountId": "512327",
         "referenceCode": "payment_test_00000001",
         "description": "payment test",
         "language": "es",
         "signature": "31eba6f397a435409f57bc16b5df54c3",
         "notifyUrl": "http://www.tes.com/confirmation",
         "additionalValues": {
            "TX_VALUE": {
               "value": 100,
               "currency": "BRL"
            }
         },
         "buyer": {
            "merchantBuyerId": "1",
            "fullName": "First name and second buyer  name",
            "emailAddress": "buyer_test@test.com",
            "contactPhone": "(11)756312633",
            "dniNumber": "811.807.405-64",
            "cnpj": "32593371000110",
            "shippingAddress": {
               "street1": "calle 100",
               "street2": "5555487",
               "city": "Sao paulo",
               "state": "SP",
               "country": "BR",
               "postalCode": "01019-030",
               "phone": "(11)756312633"
            }
         }
      },
      "creditCardTokenId": "8604789e-80ef-439d-9c3f-5d4a546bf637",
      "extraParameters": {
         "INSTALLMENTS_NUMBER": 1
      },
      "type": "AUTHORIZATION",
      "paymentMethod": "VISA",
      "paymentCountry": "BR",
      "ipAddress": "127.0.0.1"
   },
     */
}