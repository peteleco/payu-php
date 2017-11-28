<?php namespace PayU\Models;

class Order extends Model
{

    /**
     * @var Buyer
     */
    public $buyer;

    /**
     * @var
     */
    public $accountId;
    /**
     * @var
     */
    public $referenceCode;
    /**
     * @var
     */
    public $description;
    /**
     * @var
     */
    public $language;
    /**
     * @var
     */
    public $signature;
    /**
     * @var
     */
    public $notifyUrl;
    /**
     * @var AdditionalValues
     */
    public $additionalValues;

    /**
     * @param mixed $accountId
     *
     * @return Order
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * @param mixed $referenceCode
     *
     * @return Order
     */
    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;

        return $this;
    }

    /**
     * @param mixed $description
     *
     * @return Order
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param mixed $language
     *
     * @return Order
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param mixed $signature
     *
     * @return Order
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @param mixed $notifyUrl
     *
     * @return Order
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;

        return $this;
    }

    /**
     * @param mixed $additionalValues
     *
     * @return Order
     */
    public function setAdditionalValues($additionalValues)
    {
        $this->additionalValues = $additionalValues;

        return $this;
    }

    /**
     * @param Buyer $buyer
     *
     * @return Order
     */
    public function setBuyer(Buyer $buyer): Order
    {
        $this->buyer = $buyer;

        return $this;
    }
}