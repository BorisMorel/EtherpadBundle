<?php

namespace IMAG\EtherpadBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

use IMAG\EtherpadBundle\Model\GroupInterface;

class Pad implements PadInterface
{
    /**
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    private $name;

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

    /**
     * @var Timestamp
     */
    private $lastEditedTS;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $readOnlyId;
    
    /**
     * @var string
     */
    private $readOnlyUrl;

    

    /**
     * @Assert\NotNull()
     */
    private $group;

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
        
    public function getName()
    {
        if (null === $this->name) {
            if (preg_match('/[^$]+$(.*)/', $this->etherpadId, $matches)) {
                return $matches[0];
            }
        }

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

    public function setLastEditedTS($lastEditedTS)
    {
        $this->lastEditedTS = $lastEditedTS;

        return $this;
    }

    public function getLastEditedTS()
    {
        return $this->lastEditedTS;
    }

    public function getLastEdited()
    {
        $datetime = new \Datetime();

        return $datetime->setTimeStamp(substr($this->lastEditedTS, 0, 10));        
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setReadOnlyId($readOnlyId)
    {
        $this->readOnlyId = $readOnlyId;

        return $this;
    }

    public function getReadOnlyId()
    {
        return $this->readOnlyId;
    }

    public function setReadOnlyUrl($readOnlyUrl)
    {
        $this->readOnlyUrl = $readOnlyUrl;

        return $this;
    }

    public function getReadOnlyUrl()
    {
        return $this->readOnlyUrl;
    }
    
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    public function getGroup()
    {
        return $this->group === null ? 'none' : $this->group;
    }
}