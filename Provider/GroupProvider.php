<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\GroupInterface,
    IMAG\EtherpadBundle\Model\PadInterface,
    IMAG\EtherpadBundle\Model\Pad
    ;

class GroupProvider extends AbstractProvider
{
    /**
     * @var \IMAG\EtherpadBundle\Provider\PadProvider
     */
    private $padProvider;

    public function setPadProvider(PadProvider $padProvider)
    {
        $this->padProvider = $padProvider;
    }

    public function createGroup(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array());

        $group->setEtherpadId($api->groupID);
        
        return true;
    }

    public function createGroupIfNotExistsFor(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupMapper' => $group->getName(),
        ));

        $group->setEtherpadId($api->groupID);
        
        return true;
    }

    public function deleteGroup(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupID' => $group->getEtherpadId(),
        ));

        return true;
    }

    public function listPads(GroupInterface $group)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupID' => $group->getEtherpadId(),
        ));

        foreach ($api->padIDs as $item) {
            $pad = new Pad();
            $pad
                ->setEtherpadId($item)
                ->setGroup($group)
                ;


            $this->padProvider->loadPad($pad);

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

        $pad->setEtherpadId(sprintf('%s$%s', $group->getEtherpadId(), $pad->getName()));
        $this->padProvider->loadPad($pad);

        return true;
    }
}