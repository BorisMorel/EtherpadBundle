<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;

interface ProviderInterface
{
    public function __construct(UrlManager $urlManager);
}