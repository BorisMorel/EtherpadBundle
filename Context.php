<?php

namespace IMAG\EtherpadBundle;

class Context
{
    /**
     * @desc Bundle configuration parameters
     *
     * @var array $config
     */
    private $config;

    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }
 
    public function getApiUri()
    {
        return rtrim($this->config['api_uri'], '/');
    }

    public function getApiKey()
    {
        return trim($this->config['api_key']);
    }
    
}