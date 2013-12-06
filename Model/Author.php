<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

class Author
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
     * @var string
     */
    private $name;
    

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

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
        
    public function getName()
    {
        return $this->name;
    }
}