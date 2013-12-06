<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;
use IMAG\EtherpadBundle\Exception;

abstract class AbstractProvider implements ProviderInterface
{
    /**
     * @var \IMAG\EtherpadBundle\Manager\UrlManager
     */
    private $urlManager;

    public function __construct(UrlManager $urlManager)
    {
        $this->urlManager = $urlManager;
    }

    public function __call($method, array $args)
    {
        $methods = $this->getDefinedMethods();
        
        if (false === array_key_exists($method, $methods)) {
            throw new Exception\BadMethodCallException('Method isn\'t defined');
        }

        if (!empty($methods[$method]) && null === $this->getModel()) {
            throw new Exception\InvalidArgumentException(sprintf('Model isn\'t provided: class %s', get_class($this)));
        }

       return  $this->urlManager->requestApi($this, $method, $methods[$method]);
    }
}