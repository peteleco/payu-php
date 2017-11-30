<?php namespace Peteleco\PayU\Commands\Payments;

use Peteleco\PayU\Support\CommandRequest;
use Peteleco\PayU\Support\Contracts\ICommandRequest;

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
     * @return mixed
     */
    public function request(array $data = [])
    {
        return $this->post($data);
    }
}