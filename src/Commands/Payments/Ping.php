<?php namespace PayU\Commands\Payments;

use PayU\Support\CommandRequest;
use PayU\Support\CommandResponse;
use PayU\Support\Contracts\ICommandRequest;
use Psr\Http\Message\ResponseInterface;

class Ping extends CommandRequest implements ICommandRequest
{

    /**
     * Command name
     *
     * @var string
     */
    protected $command = 'PING';

    /**
     * Request path
     *
     * @var string
     */
    protected $path = '/payments-api/4.0/service.cgi';

    /**
     * @param array $data
     *
     * @return ResponseInterface
     */
    public function request(array $data = []): ResponseInterface
    {
        return $this->post($data);
    }
}