<?php


namespace App\Parser;


interface ParserInterface
{
    /**
     * Method to parse data
     *
     * @param $data
     * @return mixed
     */
    public function parse($data) : array;

}
