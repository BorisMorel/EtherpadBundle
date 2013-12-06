<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\Group;

class GroupProvider extends AbstractProvider
{
    /**
     * @var \IMAG\EtherpadBundle\Model\Group
     */
    private $group;

    public function setGroup(Group $group)
    {
        $this->group = $group;

        return $this;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getModel()
    {
        return $this->group;
    }

    public function getDefinedMethods()
    {
        return array(
            'createGroup' => array(),
            'createGroupIfNotExistsFor' => array('groupMapper' => 'getId'),
            'deleteGroup' => array('groupID' => 'getId'),
            'listPads' => array('groupID' => 'getId'),
            'createGroupPad' => array(
                'groupID' => 'getApiId',
                'padName' => array('getPad', 'getId'),
                'text' => array('getPad', 'getText'),
            ),
        );
    }
}