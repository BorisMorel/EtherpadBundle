<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

interface AuthorInterface
{

    public function __construct();

    public function getId();

    public function setEtherpadId($id);

    public function getEtherpadId();

    public function getName();

    public function addPad(Pad $pad);
    
    public function getPads();

}