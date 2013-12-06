<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

class Group
{
    /**
     * @var id
     */
    private $id;

    /**
     * @var id
     */
    private $apiId;

    /**
     * @var \IMAG\EtherpadBundle\Model\Pad
     */
    private $pad;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
        
    public function getId()
    {
        return $this->id;
    }    

    public function setApiId($apiId)
    {
        $this->apiId = $apiId;

        return $this;
    }
        
    public function getApiId()
    {
        return $this->apiId;
    }

    public function setPad(Pad $pad)
    {
        $this->pad = $pad;

        return $this;
    }
        
    public function getPad()
    {
        if (null === $this->pad) {
            throw new InvalidArgumentException('\IMAG\EtherpadBundle\Model\Group::getPad() is null');
        }

        return $this->pad;
    }
}