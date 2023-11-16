<?php

namespace App\Http\Middleware;

use App\Http\Controllers\BaseApiController;
use App\Utility\Roles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->type == Roles::CUSTOMER) {
            return $next($request);
        } else {
            return response()->json(['message' => __('messages.user_does_not_have_access_to_use_this_page')], BaseApiController::STATUS_UNAUTHORIZED);
        }
    }
}
