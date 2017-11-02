<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */

class NumTest extends PHPUnit_Framework_TestCase
{
    public function testHumanBytes()
    {
        $this->assertEquals('1.02 кб', \num\human_bytes(1024, 1000));

        $this->assertEquals('1 кб', \num\human_bytes(1024));
        $this->assertEquals('1 мб', \num\human_bytes(1024 ** 2));
        $this->assertEquals('1 гб', \num\human_bytes(1024 ** 3));
        $this->assertEquals('1 тб', \num\human_bytes(1024 ** 4));
        $this->assertEquals('1 пб', \num\human_bytes(1024 ** 5));
    }
}