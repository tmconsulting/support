<?php

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */
class ArrTest extends \PHPUnit\Framework\TestCase
{
    public function testFlipKey()
    {
        $array = ['foo' => 1, 'bar' => 1];
        $this->assertEquals($array, \arr\flip_key($array, 'foo'));

        $array    = [['foo' => 10], ['bar' => 1, 'foo' => 20]];
        $expected = [
            10 => ['foo' => 10],
            20 => ['bar' => 1, 'foo' => 20]
        ];
        $this->assertEquals($expected, \arr\flip_key($array, 'foo'));
    }

    public function testKeyPrefix()
    {
        $array = ['foo' => 1, 'bar' => 1];
        $this->assertEquals([':foo' => 1, ':bar' => 1], \arr\key_prefix($array, ':'));
    }

    public function testValuePrefix()
    {
        $array = ['foo', 'bar'];
        $this->assertEquals([':foo', ':bar'], \arr\value_prefix($array, ':'));
    }

    public function testCharset()
    {
        $cp = iconv('UTF-8', 'CP1251', 'тралала');

        $object = new stdClass();
        $object->value = 'mem';
        $object->pap   = 'lel';
        $object->gog   = $cp;

        $array = ['foo', $cp, 'baz' => ['bab' => ['hah' => $cp, 'faf' => $object]]];

        $object = new stdClass();
        $object->value = 'mem';
        $object->pap   = 'lel';
        $object->gog   = 'тралала';

        $expected = ['foo', 'тралала', 'baz' => ['bab' => ['hah' => 'тралала', 'faf' => $object]]];

        $this->assertEquals($expected, arr\charset($array));
    }
}