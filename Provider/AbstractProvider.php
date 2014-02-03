<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Manager\UrlManager;
use IMAG\EtherpadBundle\Context;

use IMAG\EtherpadBundle\Exception;

abstract class AbstractProvider implements ProviderInterface
{
    /**
     * @var \IMAG\EtherpadBundle\Manager\UrlManager
     */
    protected $urlManager;

    /**
     * @var \IMAG\EtherpadBundle\Context
     */
    protected $context;

    public function __construct(UrlManager $urlManager, Context $context)
    {
        $this->urlManager = $urlManager;
        $this->context = $context;
    }
}