<?php

namespace IMAG\EtherpadBundle\Util;

class String
{
    const CHAR = 'abcdefghijklmnopqrstuvwxyz';

    public static function getRandom($length = 16)
    {
        $chars = String::CHAR;
        $strLen = strlen($chars);
        $res = '';

        for ($i=0 ; $i < $length ; $i++) {
            $res .= $chars[rand(0, $strLen -1)];
        }

        return $res;
    }
}