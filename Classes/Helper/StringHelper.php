<?php

namespace Sle\Simpleaddress\Helper;

/**
 * StringHelper
 *
 * @author Steve Lenz <kontakt@steve-lenz.de>
 * @copyright (c) 2015, Steve Lenz
 * @version 2.0.0
 */
class StringHelper
{

    /**
     * Replaces placeholders in a string
     *
     * @param array $placeholder
     * @param string $string
     * @return string
     */
    public static function replacePlaceholder($placeholder, $string)
    {
        foreach ($placeholder as $key => $val) {
            $string = preg_replace('~###+('.$key.')+###~', $val, $string);
        }

        return $string;
    }

}
