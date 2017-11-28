<?php namespace Peteleco\PayU\Models;

/**
 * Class Buyer
 *
 * @package PayU\Models
 */
class Buyer extends Model
{

    /**
     * @var
     */
    public $merchantBuyerId;
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
     * @param mixed $merchantBuyerId
     *
     * @return Buyer
     */
    public function setMerchantBuyerId($merchantBuyerId)
    {
        $this->merchantBuyerId = $merchantBuyerId;

        return $this;
    }

    /**
     * @param mixed $fullName
     *
     * @return Buyer
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @param mixed $emailAddress
     *
     * @return Buyer
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @param mixed $contactPhone
     *
     * @return Buyer
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * @param mixed $dniNumber
     *
     * @return Buyer
     */
    public function setDniNumber($dniNumber)
    {
        $this->dniNumber = $dniNumber;

        return $this;
    }
}