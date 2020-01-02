<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Parser\Parser;
use Illuminate\Http\Request;

class FeedController extends Controller
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
            $data = $parser->xml(file_get_contents(public_path('headlines.xml')));

            return response()->json(['status' => 'success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
        }
    }

    public function getWords(Parser $parser)
    {
        $data = $parser->wiki(file_get_contents('https://en.wikipedia.org/wiki/Most_common_words_in_English'));
    }
}
