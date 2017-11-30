<?php namespace Peteleco\PayU\Exceptions;

class ErrorConnectionException extends \Exception
{
    protected $message = 'Ocorreu um erro ao conecetar com o meio de pagamento.';
}