<?php

namespace IMAG\EtherpadBundle\Model;

interface SessionInterface
{
    public function __construct();

    public function getId();
        
    public function setEtherpadId($id);
        
    public function getEtherpadId();
        
    public function setValidUntil(\Datetime $validUntil);

    public function getValidUntil();

    public function getValidUntilTS();

    public function setAuthor(AuthorInterface $author);

    public function getAuthor();

    public function setGroup(GroupInterface $group);

    public function getGroup();

}