<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

namespace TMC\Support;

use MongoDB\BSON\ObjectID;

class Mongo
{
    /**
     * @param $bson
     * @return array|string
     */
    public static function toArray($bson)
    {
        if ($bson instanceof ObjectID) {
            $bson = (string)$bson;
        }

        if (is_object($bson)) {
            $bson = (array)$bson;
        }

        if (is_array($bson)) {
            $new = [];
            foreach ($bson as $key => $val) {
                $new[$key] = static::toArray($val);
            }
        } else {
            $new = $bson;
        }

        return $new;
    }

    /**
     * Convert like an array ['mongo-long-id', '...', ...] to [new ObjectID('mongo-long-id'), new ObjectID('...'), ...]
     *
     * @param $array
     * @return array
     */
    public static function mapIds($array)
    {
        if ($array instanceof ObjectID) {
            return [$array];
        }

        return array_map(function($el) { return is_a($el, ObjectID::class) ? $el : new ObjectID($el);}, (array) $array);
    }
}