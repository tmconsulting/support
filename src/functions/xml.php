<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace xml;

use TMC\Support\Xml as XMLHelper;

if ( ! function_exists('xml\boolarr')) {

    /**
     * @param $array
     * @param $key
     * @return bool
     */
    function boolarr($array, $key)
    {
        return to_bool(strarr($array, $key));
    }
}


if ( ! function_exists('xml\boolobj')) {

    /**
     * @param $object
     * @param $key
     * @return bool
     */
    function boolobj($object, $key)
    {
        return to_bool(strobj($object, $key));
    }
}

if ( ! function_exists('xml\dump')) {

    /**
     * @param $value
     * @param bool $exit
     */
    function dump($value, $exit = true)
    {
        XMLHelper::dump($value, $exit);
    }
}

if ( ! function_exists('xml\is_valid')) {

    /**
     * @param $value
     * @return bool
     */
    function is_valid($value)
    {
        return XMLHelper::isValid($value);
    }
}

if ( ! function_exists('xml\to_array')) {

    /**
     * @param string $string
     * @return array
     */
    function to_array(string $string)
    {
        return XMLHelper::toArray($string);
    }
}



