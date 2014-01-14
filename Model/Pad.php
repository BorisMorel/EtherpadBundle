<?php

namespace IMAG\EtherpadBundle\Model;

class Pad implements PadInterface
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
    private $text;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $message;

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
        
    public function getId()
    {
        return $this->id;
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

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }
}