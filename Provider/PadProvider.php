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
                'padId' => 'getId',
                'text' => 'getText',
            ),
            'getRevisionsCount' => array('padId' => 'getId'),
            'padUsersCount',
            'padUsers',
            'deletePad',
            'getReadOnlyId',
            'setPublicStatus',
            'getPublicStatus',
            'setPassword',
            'isPasswordProtected',
            'listAuthorsOfPad',
            'getLastEdited',
            'sendClientMessage',
        );
    }

    /*

    public function createPad()
    {
        $this->urlManager->requestApi($this, __METHOD__);
    }

    public function getRevisionsCount()
    {

    }

    public function padUsersCount()
    {

    }

    public function padUsers()
    {

    }

    public function deletePad()
    {

    }

    public function getReadOnlyId()
    {

    }

    public function setPublicStatus($status)
    {

    }

    public function getPublicStatus()
    {

    }

    public function setPassword($password)
    {

    }

    public function isPasswordProtected()
    {

    }

    public function listAuthorsOfPad()
    {

    }

    public function getLastEdited()
    {

    }

    public function sendClientMessage($message)
    {

    }

    */
}