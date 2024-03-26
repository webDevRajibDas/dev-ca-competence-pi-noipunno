<?php


namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    public function successResponse($data, $code = Response::HTTP_OK){
        return response()->json(['status' => true, 'data' => $data], $code);
    }

    public function successMessage($message, $code = Response::HTTP_OK){
        return response()->json(['status' => true, 'message' => $message, 'code' => $code], $code);
    }

    public function errorResponse($message, $code){
        return response()->json(['status' => false, 'message' => $message, 'code' => $code], $code);
    }
}
