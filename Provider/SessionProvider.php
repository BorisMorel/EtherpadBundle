<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\Session;

class SessionProvider extends AbstractProvider
{
    /**
     * @var \IMAG\EtherpadBundle\Model\Session
     */
    private $session;

    public function setSession(Session $session)
    {
        $this->session = $session;

        return $this;
    }

    public function getSession()
    {
        return $this->session;
    }

    public function getModel()
    {
        return $this->session;
    }

    public function getDefinedMethods()
    {
        return array(
            'createSession' => array(
                'groupID' => array('getGroup', 'getApiId'),
                'authorID' => array('getAuthor', 'getApiId'),
                'validUntil' => 'getValidUntilTS',
            ),
            'deleteSession' => array(
                'sessionID' => 'getId',
            ),
            'getSessionInfo' => array(
                'sessionID' => 'getId',
            ),
            'listSessionsOfGroup' => array(
                'groupID' => array('getGroup', 'getId'),
            ),
            'listSessionOfAuthor' => array(
                'authorID' => array('getAuthor', 'getId'),
            ),
        );
    }
}