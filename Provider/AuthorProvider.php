<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\AuthorInterface,
    IMAG\EtherpadBundle\Model\Pad
    ;

class AuthorProvider extends AbstractProvider
{
    public function createAuthorIfNotExistsFor(AuthorInterface $author)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'authorMapper' => $author->getId(),
            'name' => $author->getName(),
        ));

        $author->setEtherpadId($api->authorID);

        return true;
    }

    public function createAuthor(AuthorInterface $author)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'name' => $author->getName(),
        ));

        $author->setEtherpadId($api->authorID);

        return true;
    }

    public function listPadsOfAuthor(AuthorInterface $author)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'authorID' => $author->getEtherpadId(),
        ));

        foreach ($api->padIDs as $item) {
            $pad = new Pad();
            $pad->setEtherpadId($item);
            xdebug_break();
            $author->addPad($pad);
        }

        return true;
    }

    public function getAuthorName(AuthorInterface $author)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'authorID' => $author->getEtherpadId(),
        ));
        
        $author->setName($api->authorName);
        
        return true;
    }
}