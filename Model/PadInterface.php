<?php

namespace IMAG\EtherpadBundle\Model;

interface PadInterface
{
    public function getId();

    public function setEtherpadId($etherpadId);

    public function getEtherpadId();

    public function setText($text);

    public function getText();

    public function setStatus($status);

    public function getStatus();

    public function setPassword($password);

    public function getPassword();

    public function setMessage($message);

    public function getMessage();
}