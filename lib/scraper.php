<?php
namespace Lib;

use DomDocument;
use DOMXPath;

class Scraper
{
    private $html; //html extracted from curl

    public function __construct($url)
    {
        try {
            $this->html = $this->getHTML($url);
        } catch (\Exception $e) {
            return;
        }
    }

    private function getHTML($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html = curl_exec($ch);
        if (!curl_errno($ch)) {
            switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                case 200:  # OK
                    break;
                default:
                    throw new \Exception("Unexpected HTTP code: {$http_code}");
            }
        }
        curl_close($ch);

        return $html;
    }


    /*
    * Returns string (textContent property) from DOMElement object
    *
    * http://php.net/manual/en/class.domelement.php
    */
    public function getTextContent($xpath)
    {
        $text_contents = [];

        foreach ($this->getElements($xpath) as $element) {
            $text_contents[] = $element->textContent;
        }

        return $text_contents;
    }


    /*
    * Returns traversable object of DOMElement objects,
    * based on XPath expression provided.
    *
    * http://php.net/manual/en/domxpath.query.php
    */
    public function getElements($xpath)
    {
        $dom_x_path = self::newDomXPath($this->html);
        if (!$dom_x_path->query($xpath)) {
                throw new \Exception("Unexpected error with XPATH -".$xpath);
        } else {
            return self::newDomXPath($this->html)->query($xpath);
        }
    }

    /*
    *  creates DOMXPath object from $html
    *  http://php.net/manual/en/class.domxpath.php
    */
    private static function newDomXPath($html)
    {
        $dom = new DomDocument();
        libxml_use_internal_errors(true); //
        @$dom->loadHTML($html);

        return new DOMXPath($dom);
    }
}
