<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\Pad;

class PadProvider extends AbstractProvider
{
    /**
     * @var \IMAG\EtherpadBundle\Model\Pad
     */
    private $pad;

    public function setPad(Pad $pad)
    {
        $this->pad = $pad;

        return $this;
    }

    public function getPad()
    {
        return $this->pad;
    }

    public function getModel()
    {
        return $this->pad;
    }

    public function getDefinedMethods()
    {
        return array(
            'createPad' => array(
                'padID' => 'getId',
                'text' => 'getText',
            ),
            'getRevisionsCount' => array('padID' => 'getId'),
            'padUsersCount' => array('padID' => 'getId'),
            'padUsers' => array('padID' => 'getId'),
            'deletePad' => array('padID' => 'getId'),
            'getReadOnlyID' => array('padID' => 'getId'),
            'setPublicStatus' => array(
                'padID' => 'getId',
                'publicStatus' => 'getStatus',
            ),
            'getPublicStatus' => array('padID' => 'getId'),
            'setPassword' => array(
                'padID' => 'getId',
                'password' => 'getPassword',
            ),
            'isPasswordProtected' => array('padID' => 'getId'),
            'listAuthorsOfPad' => array('padID' => 'getId'),
            'getLastEdited' => array('padID' => 'getId'),
            'sendClientMessage' => array(
                'padID' => 'getId',
                'msg' => 'getMessage',
            ),
        );
    }
}