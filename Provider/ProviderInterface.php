<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;
use IMAG\EtherpadBundle\Context;

interface ProviderInterface
{
    public function __construct(UrlManager $urlManager, Context $context);
}