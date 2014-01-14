<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

class Session implements SessionInterface
{
    /**
     * @var id
     */
    private $etherpadId;
    
    /**
     * @var \Datetime
     */
    private $validUntil;
    
    /**
     * @var \IMAG\EtherpadBundle\Model\Author
     */
    private $author;

    /**
     * @var \IMAG\EtherpadBundle\Model\Group
     */
    private $group;

    public function __construct()
    {
        $this->validUntil = new \Datetime("+1 day");
    }

    public function getId()
    {
        return null;
    }

    public function setEtherpadId($etherpadId)
    {
        $this->etherpadId = $etherpadId;

        return $this;
    }
        
    public function getEtherpadId()
    {
        return $this->etherpadId;
    }    

    public function setValidUntil(\Datetime $validUntil)
    {
        $this->validUntil = $validUntil;

        return $this;
    }
        
    public function getValidUntil()
    {
        return $this->validUntil;
    }    

    public function getValidUntilTS()
    {
        return $this->validUntil->getTimeStamp();
    }

    public function setAuthor(AuthorInterface $author)
    {
        $this->author = $author;

        return $this;
    }
        
    public function getAuthor()
    {
        if (null === $this->author) {
            throw new InvalidArgumentException('\IMAG\EtherpadBundle\Model\Group::getAuthor() is null');
        }

        return $this->author;
    }

    public function setGroup(GroupInterface $group)
    {
        $this->group = $group;

        return $this;
    }
        
    public function getGroup()
    {
        if (null === $this->group) {
            throw new InvalidArgumentException('\IMAG\EtherpadBundle\Model\Group::getGroup() is null');
        }

        return $this->group;
    }
}