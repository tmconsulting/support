<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace mongo;

use TMC\Support\Mongo;

if ( ! function_exists('mongo\to_array')) {

    /**
     * @param $bson
     * @return bool
     */
    function to_array($bson)
    {
        return Mongo::toArray($bson);
    }
}

if ( ! function_exists('mongo\map_ids')) {

    /**
     * @param $array
     * @return array
     */
    function map_ids($array)
    {
        return Mongo::mapIds($array);
    }
}