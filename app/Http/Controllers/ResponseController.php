<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ResponseController extends Controller
{
    public static function json(array $data, int $status = 200): JsonResponse
    {
        if (empty($data)) {
            return response()->json([], 204);
        }
        return response()->json($data, $status);
    }
}
