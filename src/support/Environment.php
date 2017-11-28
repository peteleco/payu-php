<?php namespace PayU\Support;

/**
 * Class Environment
 *
 * @package PayU\Support
 * @see     http://developers.payulatam.com/pt/api/sandbox.html
 */
class Environment
{

    const BASE_URI_SANDBOX    = 'https://sandbox.api.payulatam.com';
    const BASE_URI_PRODUCTION = 'https://api.payulatam.com';

    /**
     * @var bool
     */
    private $sandboxMode = false;

    /**
     * API language
     *
     * @var string
     */
    private $language = 'pt';

    /**
     * @var string
     */
    private $baseUri = '';
    /**
     * @var string
     */
    private $apiLogin = '';
    /**
     * @var string
     */
    private $apiKey = '';
    /**
     * @var string
     */
    private $merchantId = '';

    /**
     * @var string
     */
    private $accountId = '';

    /**
     * Environment constructor.
     *
     * @param string $apiLogin
     * @param string $apiKey
     * @param string $merchantId
     * @param string $accountId
     * @param bool   $sandboxMode
     */
    public function __construct($apiLogin, $apiKey, $merchantId = null, $accountId = null, $sandboxMode = false)
    {
        $this->apiLogin    = $apiLogin;
        $this->apiKey      = $apiKey;
        $this->merchantId  = $merchantId;
        $this->accountId   = $accountId;
        $this->sandboxMode = $sandboxMode;

        $this->handleBaseUri();
    }

    /**
     * @return Environment
     */
    private function handleBaseUri()
    {
        if ($this->isSandboxMode()) {
            return $this->setBaseUri(self::BASE_URI_SANDBOX);
        }

        return $this->setBaseUri(self::BASE_URI_PRODUCTION);
    }

    /**
     * @return bool
     */
    public function isSandboxMode()
    {
        return $this->sandboxMode;
    }

    /**
     * @param bool $sandbox
     *
     * @return Environment
     */
    public function setSandboxMode(bool $sandbox): Environment
    {
        $this->sandboxMode = $sandbox;

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     *
     * @return Environment
     */
    public function setBaseUri(string $baseUri): Environment
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    public function getApiLogin()
    {
        return $this->apiLogin;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }
}