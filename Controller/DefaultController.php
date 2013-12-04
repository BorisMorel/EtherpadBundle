<?php

namespace IMAG\EtherpadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/toto")
     */
    public function indexAction()
    {
        $pp = $this->get('imag_etherpad.pad_provider');
        $pad = new \IMAG\EtherpadBundle\Model\Pad;
        $pad->setId('toto');
        $pp
            ->setPad($pad)
            ->createPad();
    }
}
