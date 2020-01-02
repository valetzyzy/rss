<?php


namespace App\Parser;

use Carbon\Carbon;
use Parser;

class Xml implements ParserInterface
{

    /**
     * Parse method
     *
     * @param $data
     * @return array
     */
    public function parse($data) : array
    {
        $dataArray = Parser::xml($data);

        return [
            'title' => $dataArray['title'] ?? '',
            'subtitle' => $dataArray['subtitle'] ?? '',
            'author' => $dataArray['author'] ?? '',
            'logo' => $dataArray['logo'] ?? 'https://www.theregister.co.uk/Design/graphics/Reg_default/The_Register_r.png',
            'updated_at' => Carbon::parse($dataArray['updated'] ?? Carbon::now()),
            'feed' => $this->parseEntries($dataArray['entry']),
        ];
    }

    /**
     * Parse feed entries
     *
     * @param array $entries
     * @return array
     */
    private function parseEntries(array $entries) : array
    {
        if (count($entries) <= 0) return [];

        $parsedEntries = [];
        foreach ($entries as $entry) {
            $parsedEntries[] = [
                'updated_at' => Carbon::parse($entry['updated'] ?? Carbon::now()),
                'name' => $entry['author']['name'] ?? '',
                'link' => $entry['link']['@href'] ?? '',
                'title' => $entry['title']['#text'] ?? '',
                'text' => $entry['summary']['#text'] ?? '',
            ];
        }

        return $parsedEntries;
    }
}
