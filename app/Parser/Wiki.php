<?php


namespace App\Parser;


use Carbon\Carbon;
use DOMDocument;
use DOMXPath;
use Goutte\Client;

class Wiki implements ParserInterface
{
    const WORDS_LIMIT = 10;

    /**
     * Parse Wiki
     *
     * @param $link
     * @return array
     */
    public function parse($link) : array
    {
        $html = file_get_contents($link);
        $object= new DOMDocument();
        $object->loadHTML($html);
        $xpath = new DOMXpath($object);

        $trs = $xpath->query('//table[contains(@class, "wikitable")][1]/tbody/tr');

        $words = [];
        for ($i = 0; $i <= self::WORDS_LIMIT; $i++) {
            if ($i == 0) continue; //skip header

            $words[] = [
                'text' => $trs[$i]->firstChild->nodeValue,
                'rank' => $trs[$i]->childNodes[4]->nodeValue
            ];
        }

        return [
            'title' => self::WORDS_LIMIT . ' most common English words',
            'updated_at' => Carbon::now()->format('d-m-Y'),
            'words' => $words
        ];
    }
}
