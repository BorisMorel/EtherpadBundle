<?php

namespace IMAG\EtherpadBundle\Provider;

class GroupsProvider extends AbstractProvider
{
    public function getModel()
    {
        return null;
    }

    public function getDefinedMethods()
    {
        return array(
            'listAllGroups' => array(),
        );
    }
}