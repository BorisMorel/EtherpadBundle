<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\ArrayCollection;

class GroupsProvider extends AbstractProvider
{
    public function listAllGroups()
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array());
        
        $groups = new ArrayCollection($api->groupIDs);

        return $groups;
    }

}