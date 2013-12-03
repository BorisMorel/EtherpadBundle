<?php

namespace IMAG\EtherpadBundle\Model;

class Pad
{
    /**
     * @var id
     */
    private $id;

    /**
     * @var string
     */
    private $text;


    public function __construct($id = null, $text = null)
    {
        $this->id = $id;
        $this->text = $text;
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

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }
}