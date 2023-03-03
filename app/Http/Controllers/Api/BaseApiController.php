<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    public function sendResponse($result, $message) {
        //$ecnrypter = new CustomEncrypt();
        return response()->json([
            'success' => true,
            //'data' => $ecnrypter->encrypt($result),
            'data' => $result,
            'message' => $message,
        ], 200);
    }
    public function sendError($errors, $errorMessage, $code = 500) {
        return response()->json([
            'success' => false,
            'errors' => $errors,
            'message' => $errorMessage,
        ], $code);
    }

    public function sendException($ex) {
        return response()->json([
            'success' => false,
            'errors'  => new \stdClass(),
            'message' => config('app.debug') ? $ex->getMessage().' at '.$ex->getLine() : 'Some Internal Server Error'
        ], 500);
    }
}
