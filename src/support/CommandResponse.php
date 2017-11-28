<?php namespace Peteleco\PayU\Support;

use Psr\Http\Message\ResponseInterface;

class CommandResponse
{

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        var_dump($response->getBody()->getContents());
    }
}