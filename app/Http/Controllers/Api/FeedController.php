<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Parser\Parser;

class FeedController extends ApiController
{
    /**
     * Get XML feed
     *
     * @param Parser $parser
     * @return \Illuminate\Http\JsonResponse
     */
    public function getXml(Parser $parser)
    {
        try {
            $data = $parser->xml(file_get_contents('https://www.theregister.co.uk/software/headlines.atom'));

            return $this->responseWithSuccess(['data' => $data]);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage());
        }
    }

    /**
     * Get top common words
     *
     * @param Parser $parser
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWords(Parser $parser)
    {
        try {
            $data = $parser->wiki('https://en.wikipedia.org/wiki/Most_common_words_in_English');

            return $this->responseWithSuccess(['data' => $data]);
        } catch (\Exception $e) {
            return $this->responseWithError($e->getMessage());
        }
    }
}
