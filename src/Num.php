<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace TMC\Support;


class Num
{
    /**
     * @param $size
     * @param int $base
     * @return string
     */
    public static function humanBytes($size, $base = 1024)
    {
        $index  = 0;
        $unit   = ['б', 'кб', 'мб', 'гб', 'тб', 'пб'];
        $result = $size > 0 ? round($size / pow($base, ($index = intval(floor(log($size, $base))))), 2) : 0;

        return $result . ' ' . $unit[$index];
    }
}