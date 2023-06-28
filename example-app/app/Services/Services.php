<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Services
{

    public function __construct()
    {
    }

    public function sendResponse($data, $code = JsonResponse::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $code);
    }

    public function sendError($message, $code = JsonResponse::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'success' => false,
            'code' => $code,
            'message' => $message,
        ], $code);
    }
}
