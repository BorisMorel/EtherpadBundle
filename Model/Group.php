<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

class Group implements GroupInterface
{
    /**
     * @var name
     */
    private $name;

    /**
     * @var id
     */
    private $etherpadId;
    
    /**
     * @var \IMAG\EtherpadBundle\Model\ArrayCollection $pads
     */
    private $pads;

    public function __construct()
    {
        $this->pads = new ArrayCollection();
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

    public function setEtherpadId($etherpadId)
    {
        $this->etherpadId = $etherpadId;

        return $this;
    }
        
    public function getEtherpadId()
    {
        return $this->etherpadId;
    }
    
    public function addPad(Pad $pad)
    {
        $this->pads[] = $pad;
        
        return $this;
    }
    
    public function getPads()
    {
        return $this->pads;
    }
}