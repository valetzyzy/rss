<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Return json response with error
     *
     * @param $error
     * @param int $status
     * @return JsonResponse
     */
    protected function responseWithError($error, $status = 500): JsonResponse
    {
        return response()->json(['status' => 'error', 'error' => $error], $status);
    }

    /**
     * Return json response
     *
     * @param $data
     * @param int $status
     * @return JsonResponse
     */
    protected function responseWithSuccess($data): JsonResponse
    {
        return response()->json(['status' => 'success'] + $data);
    }
}
