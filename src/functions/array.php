<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace arr;

use TMC\Support\Arr;

if ( ! function_exists('arr\flip_key')) {

    /**
     * @param $array
     * @param $key
     * @return bool
     */
    function flip_key($array, $key)
    {
        return Arr::flipKey($array, $key);
    }
}

if ( ! function_exists('arr\key_prefix')) {

    /**
     * @param $array
     * @param $prefix
     * @return array
     */
    function key_prefix($array, $prefix)
    {
        return Arr::keyPrefix($array, $prefix);
    }
}

if ( ! function_exists('arr\value_prefix')) {

    /**
     * @param $array
     * @param $prefix
     * @return array
     */
    function value_prefix($array, $prefix)
    {
        return Arr::valuePrefix($array, $prefix);
    }
}

if ( ! function_exists('arr\charset')) {

    /**
     * Конвертирует массив или объект из богомерзкой CP1251 в UTF-8.
     * 
     * @param $subject
     * @param string $from
     * @param string $to
     * @return array
     */
    function charset($subject, $from = 'CP1251', $to = 'UTF-8')
    {
        return Arr::charset($subject, $from, $to);
    }
}