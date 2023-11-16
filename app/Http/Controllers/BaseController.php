<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Traits\ResponseStructure;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

class BaseController extends BaseApiController
{
    use AuthorizesRequests, ValidatesRequests, DispatchesJobs, ResponseStructure;

    public function _sendResponse(bool $success = true, int $status_code = self::STATUS_OKAY, string $message = '', $data = [], bool $logResponse = true, bool $paginatedData = false)
    {
        $response = [
            'code' => $status_code,
            'message' => $message,
            'data' => $data
        ];
        
        return Response::json($response, $status_code);
    }
}
