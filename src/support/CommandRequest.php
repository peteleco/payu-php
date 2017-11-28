<?php namespace Peteleco\PayU\Support;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * @property Client      client
 * @property Environment environment
 */
abstract class CommandRequest
{

    /**
     * @var string
     */
    protected $path;
    /**
     * Command name
     *
     * @var string
     */
    protected $command;
    /**
     * @var Client
     */
    private $client;
    /**
     * @var Environment
     */
    private $environment;

    /**
     * CommandRequest constructor.
     *
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
        $this->client      = new Client([
            'base_uri' => $this->environment->getBaseUri()
        ]);
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param array $data
     *
     * @return ResponseInterface
     */
    public function post(array $data = []): ResponseInterface
    {
        return $this->client->post($this->getPath(), $this->requestOptions($data));
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function requestOptions(array $data): array
    {
        $json = [
            'language' => $this->getEnvironment()->getLanguage(),
            'command'  => $this->getCommand(),
            'merchant' => [
                'apiLogin' => $this->getEnvironment()->getApiLogin(),
                'apiKey'   => $this->getEnvironment()->getApiKey()
            ],
            'test'     => false
        ];

        $json = array_merge($json, $data);

        return [
            'debug'                             => false,
            \GuzzleHttp\RequestOptions::HEADERS => $this->headers(),
            \GuzzleHttp\RequestOptions::JSON    => $json
        ];
    }

    /**
     * @return Environment
     */
    public function getEnvironment(): Environment
    {
        return $this->environment;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @return array
     */
    public function headers(): array
    {
        return [
            'Content-Type'    => 'application/json; charset=utf-8',
            'Accept'          => 'application/json',
            'Accept-Language' => $this->getEnvironment()->getLanguage()
        ];
    }

    /**
     * @see http://developers.payulatam.com/pt/api/considerations.html
     *
     * @param string $referenceCode
     * @param float  $value
     * @param string $currency
     *
     * @return string
     */
    public function signature(string $referenceCode, float $value, string $currency)
    {
        $environment = $this->getEnvironment();

        return md5(
            $environment->getApiKey()
            . '~' . $environment->getMerchantId()
            . '~' . $referenceCode
            . '~' . $value
            . '~' . $currency
        );
    }
}