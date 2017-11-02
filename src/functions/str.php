<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 05.05.16
 * Project: support.lc
 */

namespace str;

use TMC\Support\Str;

if ( ! function_exists('str\plural_rus')) {

    /**
     * Example: Str::pluralRus($days, 'день', 'дня', 'дней')
     *
     * @param $number
     * @param $one
     * @param $two
     * @param $five
     * @return bool
     */
    function plural_rus($number, $one, $two, $five)
    {
        return Str::pluralRus($number, $one, $two, $five);
    }
}

if ( ! function_exists('str\short_name')) {

    /**
     * @param string $lastName
     * @param string $firstName
     * @param string $patronymic
     * @param int $limit
     * @return string
     */
    function short_name(string $lastName, string $firstName = '', string $patronymic = '', int $limit = 50)
    {
        return Str::shortName($lastName, $firstName, $patronymic, $limit);
    }
}