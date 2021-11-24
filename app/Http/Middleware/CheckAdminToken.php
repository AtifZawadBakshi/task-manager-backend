<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class CheckAdminToken
{
    // use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = null;
        try{
            $user = JWTAuth::parseToken()->authenticate();
        }catch(\Exception $e){
            return response()->json(['success' => false, 'msg' => 'error']);
        }

        if(!$user)
            return response()->json(['success' => false, 'msg' => 'Unauthenticate']);
        
        return $next($request);
    }
}
