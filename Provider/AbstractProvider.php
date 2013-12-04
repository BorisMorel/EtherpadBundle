<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;

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
        
        if (false === isset($methods[$method])) {
            throw new \BadMethodCallExcpetion();
        }

        if (null === $this->getModel()) {
            throw new \InvalidArgumentException();
        }

        $this->urlManager->requestApi($this, $method, $methods[$method]);
    }
}