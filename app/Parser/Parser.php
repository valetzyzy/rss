<?php


namespace App\Parser;

use App\Parser\Xml;

class Parser
{
    /**
     * Function to parse
     *
     * @param $data
     * @param ParserInterface $parser
     * @return mixed
     */
    protected function parse($data, ParserInterface $parser)
    {
        return $parser->parse($data);
    }

    /**
     * Xml Parser
     *
     * @param $data
     * @return mixed
     */
    public function xml($data)
    {
        return $this->parse($data, new XML());
    }

    /**
     * Wikipedia parser
     *
     * @param $data
     * @return mixed
     */
    public function wiki($data)
    {
        return $this->parse($data, new Wiki());
    }
}
