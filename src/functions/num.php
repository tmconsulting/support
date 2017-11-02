<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace num;

use TMC\Support\Num;

if ( ! function_exists('num\human_bytes')) {

    /**
     * @param $size
     * @param int $base
     * @return bool
     */
    function human_bytes($size, $base = 1024)
    {
        return Num::humanBytes($size, $base);
    }
}