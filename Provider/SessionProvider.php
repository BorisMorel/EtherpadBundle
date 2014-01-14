<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\SessionInterface,
    IMAG\EtherpadBundle\Model\Group,
    IMAG\EtherpadBundle\Model\Author
    ;

class SessionProvider extends AbstractProvider
{
    public function createSession(SessionInterface $session)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'authorID' => $session->getAuthor()->getEtherpadId(),
            'groupID' => $session->getGroup()->getEtherpadId(),
            'validUntil' => $session->getValidUntilTS(),
        ));
        
        $session->setEtherpadId($api->sessionID);

        return true;
        
    }

    public function deleteSession(SessionInterface $session)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'sessionID' => $session->getEhterpadId(),
        ));

        return true;
        
    }

    public function getSessionInfo(SessionInterface $session)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'sessionID' => $session->getEtherpadId(),
        ));

        $author = new Author();
        $group = new Group();
        $datetime = new \Datetime();
        
        $session
            ->setAuthor($author->setEtherpadId($api->data->authorID))
            ->setGroup($group->setEtherpadId($api->data->groupID))
            ->setValidUntil($datetime->setTimestamp($api->data->validUntil))
            ;

        return true;
    }

    public function listSessionsOfGroup(SessionInterface $session)
    {
        throw new \BadMethodCallException("Must be implemented");

        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'groupID' => $session->getGroup()->getEtherpadId(),
        ));
        
        // Store result ??? 
        // Implement here !

        return true;
    }

    public function listSessionsOfAuthor(SessionInterface $session)
    {
        throw new \BadMethodCallException("Must be implemented");

        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'authorID' => $session->getAuthor()->getEtherpadId(),
        ));

        // Store result ???
        // Implement here !

        return true;
    }
}