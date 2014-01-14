<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

class Author implements AuthorInterface
{
    /**
     * @var id
     */
    private $id;

    /**
     * @var id
     */
    private $etherpadId;
    
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var \IMAG\EtherpadBundle\Model\ArrayCollection $pads
     */
    private $pads;
    
    public function __construct()
    {
        $this->pads = new ArrayCollection();
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
        
    public function getId()
    {
        return $this->id;
    }    

    public function setEtherpadId($apiId)
    {
        $this->apiId = $apiId;

        return $this;
    }
        
    public function getEtherpadId()
    {
        return $this->apiId;
    }    

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
        
    public function getName()
    {
        return $this->name;
    }

    public function addPad(PadInterface $pad)
    {
        $this->pads[] = $pad;

        return $this;
    }

    public function getPads()
    {
        return $this->pads;
    }
}