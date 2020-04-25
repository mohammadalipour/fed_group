<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ResponseInterface;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    /**
     * @param ResponseInterface $data
     * @param string $message
     * @return JsonResponse
     */
    public function successResponse(ResponseInterface $data, $message = '')
    {
        $response = [
            'success' => true,
            'data' => $data->getData(),
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function failResponse($error, $errorMessages = [], $code = 200)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }
}
