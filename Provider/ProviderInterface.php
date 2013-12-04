<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;

interface ProviderInterface
{
    public function __construct(UrlManager $urlManager);

    public function __call($method, array $args);

    public function getDefinedMethods();
    
    public function getModel();
}