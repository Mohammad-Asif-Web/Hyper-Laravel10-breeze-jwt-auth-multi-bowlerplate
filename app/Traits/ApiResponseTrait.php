<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait ApiResponseTrait
{
    /**
     * Return a success JSON response.
     *
     * @param string $message
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($message, $data = null, $code = null)
    {
        if($data === null){
            return response()->json([
                "status" => true,
                "message" => $message,
                "code" => "$code",
            ], $code);

        } else {
            return response()->json([
                "status" => true,
                "message" => $message,
                "data" => $data,
                "code" => "$code",
            ], $code);
        }

    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param int $code
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function errorResponse($message, $data = null, $code = null)
    {
        if($data === null){
            return response()->json([
                "status" => false,
                "message" => $message,
                "code" => "$code",
            ], $code);

        } else {
            return response()->json([
                "status" => false,
                "message" => $message,
                "data" => $data,
                "code" => "$code",
            ], $code);
        }

    }

}
