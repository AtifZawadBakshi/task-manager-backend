<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth('user-api')->check()){
            return response()->json([
                'status' => false,
                'error' => 'Unauthenticated'], 401);
        }
        return $next($request);
    }
}
