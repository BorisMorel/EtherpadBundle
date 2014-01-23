<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\PadInterface;

class PadProvider extends AbstractProvider
{
    public function getLastEdited(PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getEtherpadId(),
        ));

        $pad->setLastEditedTS($api->lastEdited);

        return true;
    }

    public function loadPad(PadInterface $pad)
    {
        $this->getLastEdited($pad);
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