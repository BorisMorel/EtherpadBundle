<?php

namespace IMAG\EtherpadBundle\Provider;

class PadsProvider extends AbstractProvider
{
    public function getModel()
    {
        return null;
    }

    public function getDefinedMethods()
    {
        return array(
            'listAllPads' => array(),
        );
    }
}