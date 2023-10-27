<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function executeService($service, $request = null){
        try {
            if ($request){
                $response = $service->execute($request);
            }
            else {
                $response = $service->execute();
            }

            return $this->successWithData($response);
        }
        catch (Throwable $exception){
            return $this->failed($exception);
        }
    }

    public function failed($data){
        return [
            'success' => false,
            'exeception' => $data
        ];
    }

    public function success(): JsonResponse {
        return response()->json(
            [
                'success' => true
            ]
        );
    }

    public function successWithData($data): JsonResponse {
        return response()->json(
            [
                'success' => true,
                'data' => $data
            ]
        );
    }
}
