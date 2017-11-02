<?php

/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 25.04.16
 * Project: support.lc
 */
class XmlTest extends \PHPUnit\Framework\TestCase
{

    public function testDump()
    {
        $xml = '<root><name>sample_name</name></root>';
        
        ob_start();
            xml\dump($xml, false);
            $content = ob_get_contents();
        ob_end_clean();
        
        $this->assertTrue(strpos($content, 'run_prettify.js') !== false);

        ob_start();
            xml\dump(new SimpleXMLElement($xml), false);
            $content = ob_get_contents();
        ob_end_clean();

        $this->assertTrue(strpos($content, 'run_prettify.js') !== false);
    }

    /**
     * @runInSeparateProcess
     */
    public function testDumpIfHeadersAlreadySent()
    {
        $xml = '<root><name>sample_name</name></root>';
        
        ob_start();
            header('Date: 2087-03-17');
            xml\dump($xml, false);
            $content = ob_get_contents();
        ob_end_clean();

        $this->assertEquals($xml, $content);
    }

    public function isValidXmlProvider()
    {
        return [
            ['<root><name>sample_name</name></root>', true],
            ['<root><name>sample_name</name></roo', false],
            ['<!doctype html><html lang="en"></html>', false],
            ['', false],
        ];
    }
    
    /**
     * @dataProvider isValidXmlProvider
     * @param $value
     * @param $expected
     */
    public function testIsValidXml($value, $expected)
    {
        $this->assertEquals($expected, xml\is_valid($value));
    }

    /**
     * @link: https://github.com/gaarf/XML-string-to-PHP-array/blob/master/test.sh
     */
    public function testXmlConvertsToArray()
    {
        $xml = '
          <tv type="cartoon">
            <show name="Family Guy">
              <dog>Brian</dog>
              <kid>Chris</kid>
              <kid>Meg</kid>
              <kid><![CDATA[<em>Stewie</em>]]></kid>
            </show>
            <show name="American Dad!">
              <pet type="fish">Klaus</pet>
              <alien nick="The Decider">
                <persona>Roger Smith</persona>
                <persona>Sidney Huffman</persona>
              </alien>
            </show>
            <show name="Edge Cases" zero="0" empty="">
              <empty></empty>
              <foo empty=""></foo>
              <zero>0</zero>
            </show>
          </tv>
        ';

        $expected = [
            "@root"       => 'tv',
            "@attributes" => ["type" => "cartoon"],
            "show"        => [
                [
                    "dog"         => 'Brian',
                    "kid"         => [
                        "Chris",
                        "Meg",
                        "<em>Stewie</em>"
                    ],
                    "@attributes" => ["name" => "Family Guy"]
                ],
                [
                    'pet'         => [
                        "@content"    => 'Klaus', // https://github.com/gaarf/XML-string-to-PHP-array#contributions
                        "@attributes" => ["type" => "fish"]
                    ],
                    'alien'       => [
                        'persona'     => [
                            'Roger Smith',
                            'Sidney Huffman'
                        ],
                        "@attributes" => ["nick" => "The Decider"]
                    ],
                    "@attributes" => ["name" => "American Dad!"]
                ],
                [
                    "empty"       => [],
                    "foo"         => [
                        "@attributes" => [
                            "empty" => ""
                        ]
                    ],
                    "zero"        => "0",
                    "@attributes" => [
                        "name"  => "Edge Cases",
                        "empty" => "",
                        "zero"  => "0"
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, xml\to_array($xml));
    }
}