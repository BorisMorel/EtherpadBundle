<?php

namespace IMAG\EtherpadBundle\Manager;

use IMAG\EtherpadBundle\Context;

use IMAG\EtherpadBundle\Provider\ProviderInterface;

class UrlManager
{
    /**
     * @var \IMAG\EtherpadBundle\Context
     */
    private $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    public function requestApi(ProviderInterface $class, $method, array $params = null)
    {
        $url = sprintf('%s/%s?apikey=%s',
                       $this->context->getApiUri(),
                       $method,
                       $this->context->getApiKey());

        foreach ($params as $key => $param) {
            if (null !== $call = call_user_func(array($class->getModel(), $param))) {
                $url .= '&'
                    .$key
                    .'='
                    .$call
                    ;
            }
        }
          
        var_dump($url);exit;
    }
}