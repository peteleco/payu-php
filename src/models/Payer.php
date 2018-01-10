<?php namespace Peteleco\PayU\Models;

/**
 * Class Payer
 *
 * @package PayU\Models
 */
class Payer extends Model
{

    /**
     * @var
     */
    public $merchantPayerId;
    /**
     * @var
     */
    public $fullName;
    /**
     * @var
     */
    public $emailAddress;
    /**
     * @var
     */
    public $contactPhone;
    /**
     * @var
     */
    public $dniNumber;
    /**
     * @var
     */
//    public $cnpj;

    /**
     * @param mixed $merchantPayerId
     *
     * @return Payer
     */
    public function setMerchantPayerId($merchantPayerId)
    {
        $this->merchantPayerId = $merchantPayerId;

        return $this;
    }

    /**
     * @param mixed $fullName
     *
     * @return Payer
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @param mixed $emailAddress
     *
     * @return Payer
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @param mixed $contactPhone
     *
     * @return Payer
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * @param mixed $dniNumber
     *
     * @return Payer
     */
    public function setDniNumber($dniNumber)
    {
        $this->dniNumber = $dniNumber;

        return $this;
    }
}