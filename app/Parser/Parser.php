<?php


namespace App\Parser;

use App\Parser\Xml;

class Parser
{
    protected function parse($data, ParserInterface $parser)
    {
        return $parser->parse($data);
    }

    public function xml($data)
    {
        return $this->parse($data, new XML());
    }

    public function wiki($data)
    {
        return $this->parse($data, new Wiki());
    }
}
