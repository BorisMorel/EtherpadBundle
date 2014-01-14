<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;
use IMAG\EtherpadBundle\Exception;

abstract class AbstractProvider implements ProviderInterface
{
    /**
     * @var \IMAG\EtherpadBundle\Manager\UrlManager
     */
    protected $urlManager;

    public function __construct(UrlManager $urlManager)
    {
        $this->urlManager = $urlManager;
    }
}