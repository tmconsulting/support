<?php

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 10.03.16
 * Project: support.lc
 */
class StrTest extends \PHPUnit\Framework\TestCase
{
    public function toBoolProvider()
    {
        return [
            [true, true],
            [true, 't'],
            [true, '1'],
            [true, 'true'],
            [true, 'TRUE'],
            [true, '    true    '],
            [true, 'yes'],
            [true, 'y'],
            [false, 'asdasd'],
            [false, null],
            [false, 12312313123],
        ];
    }

    /**
     * @dataProvider toBoolProvider
     * @param $expected
     * @param $actual
     */
    public function testToBool($expected, $actual)
    {
        $this->assertEquals($expected, to_bool($actual));
    }

    public function testPluralRus()
    {
        $zero = str\plural_rus(0, 'день', 'дня', 'дней');
        $one  = str\plural_rus(1, 'день', 'дня', 'дней');
        $two  = str\plural_rus(2, 'день', 'дня', 'дней');
        $five = str\plural_rus(5, 'день', 'дня', 'дней');
        $many = str\plural_rus(5000, 'день', 'дня', 'дней');

        $this->assertEquals('дней', $zero);
        $this->assertEquals('день', $one);
        $this->assertEquals('дня', $two);
        $this->assertEquals('дней', $five);
        $this->assertEquals('дней', $many);
    }

    public function shortNameProvider()
    {
        return [
            ['Путин В. С.', 'Путин', 'Владимир', 'Сергеевич'],
            ['Путин',       'Путин', '', 'Сергеевич'],
            ['Путин В.',    'Путин', 'Владимир', ''],
            ['Пут... В. С.', 'Путинсоченьдлиннымибольшим', 'Владимир', 'Сергеевич', 3],
            ['Путин В. С.', 'Путин', 'Владимир', 'Сергеевич'],
            ['', ''],
        ];
    }

    /**
     * @dataProvider shortNameProvider
     * @param $expected
     * @param $lastName
     * @param $firstName
     * @param $patronymic
     * @param int $limit
     */
    public function testShortName($expected, $lastName, $firstName = '', $patronymic = '', $limit = 50)
    {
        $this->assertEquals($expected, \str\short_name($lastName, $firstName, $patronymic, $limit));
    }
}