<?php namespace Peteleco\PayU\Models;

class Transaction extends Model
{

    CONST TYPE_AUTHORIZATION_AND_CAPTURE = 'AUTHORIZATION_AND_CAPTURE';
    /**
     * @var Order
     */
    public $order;

    /**
     * @var Payer
     */
    public $payer;

    /**
     * @var string
     */
    public $creditCardTokenId;
    /**
     * @var array
     */
    public $extraParameters;
    /**
     * @var string
     */
    public $type = 'AUTHORIZATION_AND_CAPTURE';
    /**
     * @var string
     */
    public $paymentMethod;
    /**
     * @var string
     */
    public $paymentCountry = 'BR';
    /**
     * @var string|null
     */
    public $ipAddress = null;
    /**
     * @var array
     */
    protected $apiHidden = [
        'installments'
    ];
    /**
     * @var int
     */
    protected $installments = 1;

    /**
     * @param string $creditCardTokenId
     *
     * @return Transaction
     */
    public function setCreditCardTokenId(string $creditCardTokenId): Transaction
    {
        $this->creditCardTokenId = $creditCardTokenId;

        return $this;
    }

    /**
     * @param array $extraParameters
     *
     * @return Transaction
     */
    public function setExtraParameters(array $extraParameters): Transaction
    {
        $this->extraParameters = $extraParameters;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return Transaction
     */
    public function setType(string $type): Transaction
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $paymentMethod
     *
     * @return Transaction
     */
    public function setPaymentMethod(string $paymentMethod): Transaction
    {
        $this->paymentMethod = strtoupper($paymentMethod);

        return $this;
    }

    /**
     * @param string $paymentCountry
     *
     * @return Transaction
     */
    public function setPaymentCountry(string $paymentCountry): Transaction
    {
        $this->paymentCountry = $paymentCountry;

        return $this;
    }

    /**
     * @param Order $order
     *
     * @return Transaction
     */
    public function setOrder(Order $order): Transaction
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @param null|string $ipAddress
     *
     * @return Transaction
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function toApi(): array
    {
        $data                    = parent::toApi();
        $data['extraParameters'] = [
            'INSTALLMENTS_NUMBER' => $this->getInstallments()
        ];

        return $data; // TODO: Change the autogenerated stub
    }

    /**
     * @return int
     */
    public function getInstallments(): int
    {
        return $this->installments;
    }

    /**
     * @param int $installments
     *
     * @return Transaction
     */
    public function setInstallments(int $installments): Transaction
    {
        $this->installments = $installments;

        return $this;
    }

    /**
     * @param Payer $payer
     *
     * @return Transaction
     */
    public function setPayer(Payer $payer): Transaction
    {
        $this->payer = $payer;

        return $this;
    }
}