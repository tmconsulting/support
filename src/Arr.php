<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace TMC\Support;

class Arr extends \Illuminate\Support\Arr
{

    /**
     * @param $array
     * @param $key
     * @return array
     */
    public static function flipKey($array, $key)
    {
        $temp = [];
        foreach ($array as $value) {
            $item = is_object($value) ? ($value->{$key} ?? null) : ($value[$key] ?? null);
            if ( ! $item) {
                return $array;
            }
            $temp[$item] = (array) $value;
        }

        return $temp;
    }

    /**
     * Добавляет префикс к ключам массива.
     *
     * @param $prefix
     * @param $array
     * @return array
     */
    public static function keyPrefix($array, $prefix)
    {
        return array_combine(
            array_map(function($k) use ($prefix) { return $prefix . $k; }, array_keys($array)),
            $array
        );
    }

    /**
     * Добавляет префикс к строковым значениям массива.
     * 
     * @param $array
     * @param $prefix
     */
    public static function valuePrefix($array, $prefix)
    {
        foreach ($array as & $value) {
            if (is_string($value)) {
                $value = $prefix . $value;
            }
        }
        unset($value);

        return $array;
    }

    /**
     * Конвертирует массив или объект из богомерзкой CP1251 в UTF-8.
     * 
     * @param $subject
     * @param string $from
     * @param string $to
     * @return mixed
     */
    public static function charset($subject, $from = 'CP1251', $to = 'UTF-8')
    {
        if (is_array($subject) || is_object($subject)) {
            foreach ($subject as & $value) {
                $value = static::charset($value, $from, $to);
            }
            return $subject;
        } else {
            return iconv($from, $to, $subject);
        }
    }
}