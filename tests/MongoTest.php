<?php

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

use MongoDB\BSON\ObjectID;

class MongoTest extends PHPUnit_Framework_TestCase
{
    protected $idOne = '56e1da733b5d9e5f855b2781';
    protected $idTwo = '56e1da6d3b5d9e5f7e0f2b21';

    public function testMapIds()
    {
        $this->assertEquals([new ObjectID($this->idOne), new ObjectID($this->idTwo)], \mongo\map_ids([$this->idOne, $this->idTwo]));
        $this->assertEquals([new ObjectID($this->idOne)], \mongo\map_ids(new ObjectID($this->idOne)));
    }

    public function testBsonToArray()
    {
        $std = new stdClass();
        $std->foo = 'true';
        $std->bar = 'false';
        $std->id  = new ObjectID($this->idTwo);
        $std->baz = new stdClass();
        $std->baz->foo = 1;
        $std->baz->guz = 2;
        $std->baz->xuz = 3;
        $std->baz->id = new ObjectID($this->idOne);

        $expected = [
            'foo' => 'true',
            'bar' => 'false',
            'id'  => $this->idTwo,
            'baz' => [
                'foo' => 1,
                'guz' => 2,
                'xuz' => 3,
                'id'  => $this->idOne,
            ]
        ];

        $this->assertEquals($expected, \mongo\to_array($std));
    }
}