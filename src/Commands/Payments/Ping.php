<?php namespace Peteleco\PayU\Commands\Payments;

use Peteleco\PayU\Support\CommandRequest;
use Peteleco\PayU\Support\CommandResponse;
use Peteleco\PayU\Support\Contracts\ICommandRequest;
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