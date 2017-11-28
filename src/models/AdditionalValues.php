<?php namespace PayU\Models;

class AdditionalValues extends Model
{

    /**
     * @var float
     */
    public $value;

    /**
     * @var string
     */
    public $currency = 'BRL';

    /**
     * @param string $currency
     *
     * @return AdditionalValues
     */
    public function setCurrency(string $currency): AdditionalValues
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param float $value
     *
     * @return AdditionalValues
     */
    public function setValue(float $value): AdditionalValues
    {
        $this->value = $value;

        return $this;
    }

    public function toApi(): array
    {
        return [
            'TX_VALUE' => parent::toApi()
        ];
    }
}