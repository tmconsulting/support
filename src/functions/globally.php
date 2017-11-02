<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

use TMC\Support\Str;

if ( ! function_exists('to_bool')) {

    /**
     * @param $value
     * @return bool
     */
    function to_bool($value)
    {
        return Str::toBool($value);
    }
}

if ( ! function_exists('objval')) {

    /**
     * Преобразует объект к $function, если такой имеется.
     *
     * @param $object
     * @param $key
     * @param null $default
     * @param string $function
     * @return null
     */
    function objval($object, $key, $default = null, string $function = 'strval')
    {
        $value = $function(object_get($object, $key));
        return empty($value) ? $default : $value;
    }
}

if ( ! function_exists('strobj')) {

    /**
     * Преобразует объект к строке, если такой имеется.
     *
     * @param $object
     * @param $key
     * @param $default
     * @return null|string
     */
    function strobj($object, $key, $default = null)
    {
        return objval($object, $key, $default, 'strval');
    }
}

if ( ! function_exists('intobj')) {

    /**
     * @param $object
     * @param $key
     * @param $default
     * @return null|string
     */
    function intobj($object, $key, $default = null)
    {
        return objval($object, $key, $default, 'intval');
    }
}

if ( ! function_exists('floatobj')) {

    /**
     * @param $object
     * @param $key
     * @param $default
     * @return null|string
     */
    function floatobj($object, $key, $default = null)
    {
        return objval($object, $key, $default, 'floatval');
    }
}


if ( ! function_exists('boolobj')) {

    /**
     * @param $object
     * @param $key
     * @param $default
     * @return null|string
     */
    function boolobj($object, $key, $default = false)
    {
        return objval($object, $key, $default, 'boolval');
    }
}


if ( ! function_exists('arrval')) {

    /**
     * @param $array
     * @param $key
     * @param null $default
     * @param string $function
     * @return null|string
     */
    function arrval($array, $key, $default = null, string $function = 'strval')
    {
        $value = $function(array_get($array, $key));
        return empty($value) ? $default : $value;
    }
}


if ( ! function_exists('strarr')) {

    /**
     * @param $array
     * @param $key
     * @param string $default
     * @return null|string
     */
    function strarr($array, $key, $default = null)
    {
        return arrval($array, $key, $default, 'strval');
    }
}

if ( ! function_exists('intarr')) {

    /**
     * @param $array
     * @param $key
     * @param $default
     * @return null|string
     */
    function intarr($array, $key, $default = null)
    {
        return arrval($array, $key, $default, 'intval');
    }
}

if ( ! function_exists('floatarr')) {

    /**
     * @param $array
     * @param $key
     * @param $default
     * @return null|string
     */
    function floatarr($array, $key, $default = null)
    {
        return arrval($array, $key, $default, 'floatval');
    }
}

if ( ! function_exists('boolarr')) {

    /**
     * @param $array
     * @param $key
     * @param $default
     * @return null|string
     */
    function boolarr($array, $key, $default = false)
    {
        return arrval($array, $key, $default, 'boolval');
    }
}

if ( ! function_exists('mb_ucfirst')) {

    /**
     * @param $string
     * @return string
     */
    function mb_ucfirst($string)
    {
        return Str::ucfirst($string);
    }
}

