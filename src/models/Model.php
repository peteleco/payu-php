<?php namespace PayU\Models;

/**
 * Class Model
 *
 * @package PayU\models
 */
abstract class Model
{

    /**
     * @var array
     */
    protected $apiHidden = [];

    /**
     * Model constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fill($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }

        return $this;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return mixed
     */
    private function setAttribute($key, $value)
    {
        $method = 'set' . ucfirst($key);

        return $this->{$method}($value);
    }

    /**
     * @return array
     */
    public function toApi(): array
    {
        $data = $this->getApiAttributes(); // (array)$this;
        foreach ($data as $attribute => $value) {
            if (is_object($value)) {
                $data[$attribute] = $value->toApi();
            }
        }

        return $data;
    }

    /**
     *
     * @return array
     */
    public function getApiAttributes()
    {

        $data = get_object_vars($this);
        unset($data['apiHidden']);
        foreach ($this->apiHidden as $attribute) {
            unset($data[$attribute]);
        }

        return $data;
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = $this->getApiAttributes(); //(array)$this;
        foreach ($data as $attribute => $value) {
            if (is_object($value)) {
                $data[$attribute] = $value->toArray();
            }
        }

        return $data;
    }
}