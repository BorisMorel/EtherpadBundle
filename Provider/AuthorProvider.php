<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\Author;

class AuthorProvider extends AbstractProvider
{
    /**
     * @var \IMAG\EtherpadBundle\Model\Author
     */
    private $author;

    public function setAuthor(Author $author)
    {
        $this->author = $author;

        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getModel()
    {
        return $this->author;
    }

    public function getDefinedMethods()
    {
        return array(
            'createAuthor' => array('name' => 'getName'),
            'createAuthorIfNotExistsFor' => array(
                'authorMapper' => 'getId',
                'name' => 'getName',
            ),
            'listPadsOfAuthor' => array('authorID' => 'getId'),
            'getAuthorName' => array('authorID' => 'getId'),
        );
    }
}