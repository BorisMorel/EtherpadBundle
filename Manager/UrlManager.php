<?php

namespace IMAG\EtherpadBundle\Manager;

use IMAG\EtherpadBundle\Context;

use IMAG\EtherpadBundle\Provider\ProviderInterface;
use IMAG\EtherpadBundle\Exception;

use Buzz\Browser;

class UrlManager
{
    /**
     * @var \IMAG\EtherpadBundle\Context
     */
    private $context;

    /**
     * @var \Buzz\Browser
     */
    private $buzz;

    public function __construct(Context $context, Browser $buzz)
    {
        $this->context = $context;
        $this->buzz = $buzz;
    }

    public function requestApi($method, array $params = null)
    {
        $url = sprintf('%s/%s?apikey=%s',
                       $this->context->getApiUri(),
                       $method,
                       $this->context->getApiKey());

        foreach ($params as $key => $param) {
            if (null !== $param) {
                $url .= '&'
                    .$key
                    .'='
                    .$param
                    ;
            }
        }

        return $this->sendRequest($url);
    }

    private function sendRequest($url)
    {
        $response = $this->buzz->get($url);
        
        $content = json_decode($response->getContent());
        
        if (null === $content) {
            throw new Exception\RuntimeException(sprintf('Response is wrong for url: %s', $url));
        }
        
        switch($content->code) {
        case 0:
            return $content->data;
            break;
            
        case 1:
            throw new Exception\InvalidArgumentException($content->message);
            break;
            
        case 2:
            throw new Exception\RuntimeException($content->message);
            break;
            
        case 3:
            // Excpetion handle before ; I think that this line is not necessary 
            throw new Exception\BadMethodCallException($content->message);
            break;
            
        case 4:
            throw new Exception\InvalidArgumentException($content->message);
            break;
            
        default:
            throw new Exception\RuntimeException($content->message);
            break;
        }
    }
}