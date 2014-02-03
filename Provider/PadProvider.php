<?php

namespace IMAG\EtherpadBundle\Provider;

use IMAG\EtherpadBundle\Model\PadInterface;

class PadProvider extends AbstractProvider
{
    public function createPad(PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getName(),
        ));
        
        $pad->setEtherpadId($pad->getName());

        return true;
    }

    public function setPublicStatus(PadInterface $pad, $bool)
    {
        $bool = (bool)$bool ? 'true': 'false';

        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getEtherpadId(),
            'publicStatus' => $bool
        ));

        $pad->setStatus($bool);

        return true;
    }
    
    public function getPublicStatus(PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getEtherpadId(),
        ));

        /**
         * [Etherpad][Bug] If setPublicStatus is called with a wrong bool parameter like 0 instead of true getPublicStatus return a null data array
         */
        if (isset($api->publicStatus)) {
            $status = $api->publicStatus;
        } else {
            $status = false;
        }
        
        $pad->setStatus($status);

        return $this;
    }

    public function getLastEdited(PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getEtherpadId(),
        ));

        $pad->setLastEditedTS($api->lastEdited);

        return $this;
    }

    public function getReadOnlyID(PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getEtherpadId(),
        ));

        $pad->setReadOnlyId($api->readOnlyID);

        return $this;
    }

    public function deletePad(PadInterface $pad)
    {
        $api = $this->urlManager->requestApi(__FUNCTION__, array(
            'padID' => $pad->getEtherpadId(),
        ));

        return $this;
    }

    public function loadPad(PadInterface $pad)
    {
        $this
            ->getLastEdited($pad)
            ->getPublicStatus($pad)
            ->getUrl($pad)
            ->getReadOnlyID($pad)
            ->getReadOnlyUrl($pad)
            ;
    }

    private function getUrl(PadInterface $pad)
    {
        $url = sprintf('%s/%s', $this->context->getPublicUri(), $pad->getEtherpadId());
        $pad->setUrl($url);

        return $this;
    }

    private function getReadOnlyUrl(PadInterface $pad)
    {
        xdebug_break();

        $url = sprintf('%s/%s', $this->context->getPublicUri(), $pad->getReadOnlyId());
        $pad->setReadOnlyUrl($url);
        
        return $this;
    }

    /**
     * Not implemented fct
     */
    /*
      public function getDefinedMethods()
      {
      return array(
      'getRevisionsCount' => array('padID' => 'getId'),
      'padUsersCount' => array('padID' => 'getId'),
      'padUsers' => array('padID' => 'getId'),
      'setPassword' => array(
      'padID' => 'getId',
      'password' => 'getPassword',
      ),
      'isPasswordProtected' => array('padID' => 'getId'),
      'listAuthorsOfPad' => array('padID' => 'getId'),
      'sendClientMessage' => array(
      'padID' => 'getId',
      'msg' => 'getMessage',
      ),
      );
      }
    */
}