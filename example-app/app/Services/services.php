<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Services
{
    public function success($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function error($message, $code)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }
}
