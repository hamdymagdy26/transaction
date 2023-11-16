<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class BaseApiController extends Controller
{

    const LOG_TYPE_INFO = 'info';

    const LOG_TYPE_ERROR = 'error';

    const LOG_TYPE_WARNING = 'warning';


    // Response Status Code
    const STATUS_OKAY = 200;

    const STATUS_CREATED = 201;

    const STATUS_ACCEPTED = 202;

    const STATUS_NON_AUTHORIZE_Status = 203;

    const STATUS_NO_CONTENT = 204;

    const STATUS_RESET_CONTENT = 205;

    const STATUS_FOUND = 302;

    const STATUS_BAD_REQUEST = 400;

    const STATUS_UNAUTHORIZED = 401;

    const STATUS_FORBIDDEN = 403;

    const STATUS_NOT_FOUND = 404;

    const STATUS_METHOD_NOT_ALLOWED = 405;

    const STATUS_NOT_ACCEPTABLE = 406;

    const STATUS_CONFLICT = 409;

    const STATUS_LENGTH_REQUIRED = 411;

    const STATUS_PRECONDITION_FAILED = 412;

    const STATUS_UNSUPPORTED_MEDIA_TYPE = 415;

    const STATUS_UNPROCESSABLE_ENTITY = 422;

    const STATUS_ERROR = 500;

    const STATUS_NOT_IMPLEMENTED = 501;

    public const SUCCESS = true;
    public const FAILED = false;
}
