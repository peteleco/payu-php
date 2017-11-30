<?php namespace Peteleco\PayU\Exceptions;

/**
 * Class RequestFailedException
 *
 * @package Peteleco\PayU\Exceptions
 */
class RequestFailedException extends \Exception
{

    protected $message = 'Ocorreu uma falha na requisição.';
}