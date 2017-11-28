<?php namespace Peteleco\PayU\Models;

class CreditCardToken extends Model
{

    public $payerId;
    public $name;
    public $identificationNumber;
    public $paymentMethod;
    public $number;
    public $expirationDate;

    /**
     * @param mixed $payerId
     *
     * @return CreditCardToken
     */
    public function setPayerId($payerId)
    {
        $this->payerId = $payerId;

        return $this;
    }

    /**
     * @param mixed $name
     *
     * @return CreditCardToken
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param mixed $identificationNumber
     *
     * @return CreditCardToken
     */
    public function setIdentificationNumber($identificationNumber)
    {
        $this->identificationNumber = $identificationNumber;

        return $this;
    }

    /**
     * @param mixed $paymentMethod
     *
     * @return CreditCardToken
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * @param mixed $number
     *
     * @return CreditCardToken
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param mixed $expirationDate
     *
     * @return CreditCardToken
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }
}