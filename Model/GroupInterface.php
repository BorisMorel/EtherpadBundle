<?php

namespace IMAG\EtherpadBundle\Model;

use IMAG\EtherpadBundle\Exception\InvalidArgumentException;

interface GroupInterface
{
    public function __construct();

    public function getName();

    public function setEtherpadId($id);

    public function getEtherpadId();

    public function addPad(Pad $pad);
    
    public function getPads();

}