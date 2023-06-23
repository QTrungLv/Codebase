<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Services
{

    public function __construct() {}

    public function sendResponse($data, $message, $code = JsonResponse::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function sendError($message, $code)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
