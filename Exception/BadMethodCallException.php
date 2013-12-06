<?php

namespace IMAG\EtherpadBundle\Exception;

class BadMethodCallException extends \BadMethodCallException
{
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}