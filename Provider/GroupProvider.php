<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\GroupInterface,
    IMAG\EtherpadBundle\Model\PadInterface,
    IMAG\EtherpadBundle\Model\Pad
    ;

class GroupProvider extends AbstractProvider
{
    public function createGroup(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array());

        $group->setEtherpadId($api->groupID);
        
        return true;
    }

    public function createGroupIfNotExistsFor(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupMapper' => $group->getId(),
        ));

        $group->setEtherpadId($api->groupID);
        
        return true;
    }

    public function deleteGroup(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupMapper' => $group->getId(),
        ));

        return true;
    }

    public function listPads(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupMapper' => $group->getId(),
        ));

        foreach ($api->padIDs as $item) {
            $pad = new Pad();
            $pad->setEtherpadId($item);
            
            $group->addPad($pad);
        }

        return true;
    }

    public function createGroupPad(GroupInterface $group, PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupID' => $group->getEtherpadId(),
            'padName' => $pad->getName(),
            'text' => $pad->getText(),
        ));

        return true;
    }
}