<?php

namespace App\Traits;

use App\Http\Controllers\Api\v1\BaseApiController;
use Illuminate\Support\Facades\Response;

trait ResponseStructure
{
    public function _sendResponse(bool $success = true, int $status_code = BaseApiController::STATUS_OKAY, string $message = '', $data = [], bool $logResponse = true, bool $paginatedData = false)
    {
        if ($success) {
            if ($paginatedData) {
                $response = [
                    'success' => $success,
                    'status_code' => $status_code,
                    'message' => $message,
                    'data' => $data->items(),
                    'meta' => [
                        [
                            'current_page' => $data->currentPage(),
                            'from' => $data->firstItem(),
                            'last_page' => $data->lastPage(),
                            'path' => $data->path(),
                            'per_page' => $data->perPage(),
                            'to' => $data->lastItem(),
                            'total' => $data->total(),
                        ]
                    ]
                ];
            } else {
                $response = [
                    'success' => $success,
                    'status_code' => $status_code,
                    'message' => $message,
                    'data' => $data
                ];
            }
        } else {
            $response = [
                'success' => $success,
                'status_code' => $status_code,
                'message' => $message,
                'errors' => $data
            ];
        }
        return Response::json($response, $status_code);
    }
}