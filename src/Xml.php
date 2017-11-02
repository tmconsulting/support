<?php
/**
 * Created by Roquie.
 * E-mail: roquie0@gmail.com
 * GitHub: Roquie
 * Date: 25.04.16
 * Project: support.lc
 */

namespace TMC\Support;


use SimpleXMLElement;

class Xml
{
    /**
     * @param $value
     * @param bool $exit
     * @return void
     */
    public static function dump($value, $exit = true)
    {
        if ($value instanceof SimpleXMLElement) {
            $value = $value->asXML();
        }

        if ( ! headers_sent()) {
            header('Content-Type: text/xml');
            echo $value;

            !$exit ?: exit;
            return;
        }

        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($value);

        echo str_replace('{{ code }}', htmlentities($dom->saveXML()), file_get_contents(__DIR__ . '/stub/pretty.html'));

        !$exit ?: exit;
    }

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value)
    {
        $content = trim($value);

        if (empty($content)) {
            return false;
        }
        //html в жопу.
        if (stripos($content, '<!DOCTYPE html>') !== false) {
            return false;
        }

        libxml_use_internal_errors(true);
        simplexml_load_string($content);
        $errors = libxml_get_errors();
        libxml_clear_errors();

        return empty($errors);
    }

    /**
     * Конвертирует XML в массив.
     * json_encode/decode способ возвращает некорректный тип (массив), если нода пуста. 
     * И не читает данные в CDATA.
     *
     * @param string $string
     * @return array
     */
    public static function toArray(string $string)
    {
        return xmlstr_to_array($string);
    }
}