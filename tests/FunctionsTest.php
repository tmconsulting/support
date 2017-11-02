<?php

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */
class FunctionsTest extends \PHPUnit\Framework\TestCase
{
    protected $object;
    protected $array;

    public function setUp()
    {
        $this->object = new stdClass();
        $this->object->foo = (new class {
            public $sub;
            public function __construct() {
                $this->sub = new stdClass();
                $this->sub->str   = 'string';
                $this->sub->float = 1233.11;
                $this->sub->bar   = 123;
                $this->sub->baz   = true;
                $this->sub->bool   = false;
            }
            public function __toString() {
                return 'string';
            }
        });

        $this->array = [
            'foo' => ['sub' => [
                'bar'   => 123,
                'baz'   => true,
                'bool'  => false,
                'float' => 1233.11,
                'str'   => 'string',
            ]]
        ];
    }

    public function testObjVal()
    {
        $this->assertEquals('string', objval($this->object, 'foo', null, 'strval'));
        $this->assertNull(objval($this->object, 'foo.empty', null, 'strval'));
    }

    public function testStrObj()
    {
        $this->assertEquals('string', strobj($this->object, 'foo'));
        $this->assertEquals('123', strobj($this->object, 'foo.sub.bar'));
        $this->assertNull(strobj($this->object, 'foo.empty', null));
    }

    public function testIntObj()
    {
        $this->assertEquals(0, intobj($this->object, 'foo.sub.str'));
        $this->assertEquals(123, intobj($this->object, 'foo.sub.bar'));
        $this->assertNull(intobj($this->object, 'foo.empty', null));
    }

    public function testFloatObj()
    {
        $this->assertEquals(0, floatobj($this->object, 'foo.sub.str'));
        $this->assertEquals(1233.11, floatobj($this->object, 'foo.sub.float'));
        $this->assertEquals(123, floatobj($this->object, 'foo.sub.bar'));
        $this->assertNull(floatobj($this->object, 'foo.empty', null));
    }

    public function testBoolObj()
    {
        $this->assertTrue(boolobj($this->object, 'foo.sub.str'));
        $this->assertTrue(boolobj($this->object, 'foo.sub.float'));
        $this->assertTrue(boolobj($this->object, 'foo.sub.bar'));
        $this->assertTrue(boolobj($this->object, 'foo.sub.baz'));
        $this->assertFalse(boolobj($this->object, 'foo.sub.bool'));
        $this->assertNull(boolobj($this->object, 'foo.empty', null));
    }

    public function testArrVal()
    {
        $this->assertEquals('string', arrval($this->array, 'foo.sub.str', null, 'strval'));
        $this->assertNull(arrval($this->array, 'foo.empty', null, 'strval'));
    }

    public function testStrArr()
    {
        $this->assertEquals('string', strarr($this->array, 'foo.sub.str'));
        $this->assertEquals('123', strarr($this->array, 'foo.sub.bar'));
        $this->assertNull(strarr($this->array, 'foo.empty', null));
    }

    public function testIntArr()
    {
        $this->assertEquals(0, intarr($this->array, 'foo.sub.str'));
        $this->assertEquals(123, intarr($this->array, 'foo.sub.bar'));
        $this->assertNull(intarr($this->array, 'foo.empty', null));
    }

    public function testFloatArr()
    {
        $this->assertEquals(0, floatarr($this->array, 'foo.sub.str'));
        $this->assertEquals(1233.11, floatarr($this->array, 'foo.sub.float'));
        $this->assertEquals(123, floatarr($this->array, 'foo.sub.bar'));
        $this->assertNull(null, floatarr($this->array, 'foo.empty', null));
    }

    public function testBoolArr()
    {
        $this->assertTrue(boolarr($this->array, 'foo.sub.str'));
        $this->assertTrue(boolarr($this->array, 'foo.sub.float'));
        $this->assertTrue(boolarr($this->array, 'foo.sub.bar'));
        $this->assertTrue(boolarr($this->array, 'foo.sub.baz'));
        $this->assertFalse(boolarr($this->array, 'foo.sub.bool'));
        $this->assertNull(boolarr($this->array, 'foo.empty', null));
    }

    public function testXmlBoolArr()
    {
        $array = ['foo' => ['bar' => 'baz', 'guz' => 'yes']];
        $this->assertFalse(\xml\boolarr($array, 'foo.bar'));
        $this->assertTrue(\xml\boolarr($array, 'foo.guz'));
    }

    public function testXmlBoolObj()
    {
        $std = new stdClass();
        $std->foo = 'true';
        $std->bar = 'false';
        $std->baz = true;

        $this->assertTrue(\xml\boolobj($std, 'foo'));
        $this->assertTrue(\xml\boolobj($std, 'baz'));
        $this->assertFalse(\xml\boolobj($std, 'bar'));
    }
}