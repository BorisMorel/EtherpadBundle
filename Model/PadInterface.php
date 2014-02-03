<?php

namespace IMAG\EtherpadBundle\Model;

interface PadInterface
{
    public function getName();

    public function getGroup();

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

    public function setUrl($url);

    public function getUrl();

    public function setReadOnlyId($id);

    public function getReadOnlyId();
 
    public function setReadOnlyUrl($url);

    public function getReadOnlyUrl();

}