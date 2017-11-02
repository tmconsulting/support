<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace TMC\Support;

class Str extends \Illuminate\Support\Str
{

    /**
     * Convert string to boolean.
     *
     * @param $value
     * @return bool
     */
    public static function toBool($value)
    {
        if (is_bool($value)) {
            return $value;
        }

        switch(trim(static::lower($value))) {
            case 1:
            case 'true':
            case 't':
            case 'yes':
            case 'y':
                return true;
        }

        return false;
    }

    /**
     * Example: Str::pluralRus($days, 'день', 'дня', 'дней')
     * 
     * @param $number
     * @param $one
     * @param $two
     * @param $five
     */
    public static function pluralRus($number, $one, $two, $five)
    {
        $result = $five;

        if (($number - $number % 10) % 100 != 10) {
            if ($number % 10 == 1) {
                $result = $one;
            } elseif ($number % 10 >= 2 && $number % 10 <= 4) {
                $result = $two;
            } else {
                $result = $five;
            }
        }

        return $result;
    }

    /**
     * Возвращает сокращенное написание имени персоны.
     *
     * @param string $lastName
     * @param string $firstName
     * @param string $patronymic
     * @param int $limit
     * @return string
     */
    public static function shortName(string $lastName, string $firstName = '', string $patronymic = '', int $limit = 50)
    {
        $name   = [];
        $name[] = static::limit($lastName, $limit);

        if (strlen($firstName) > 0) {
            $name[] = static::upFirstWord($firstName) . '.';

            if (strlen($patronymic) > 0) {
                $name[] = static::upFirstWord($patronymic) . '.';
            }
        }

        return join(' ', $name);
    }

    /**
     * @param string $string
     * @return string
     */
    protected static function upFirstWord(string $string)
    {
        return static::upper(static::substr($string, 0, 1));
    }
}