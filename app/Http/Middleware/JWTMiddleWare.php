<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

use Response;
use Exception;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JWTMiddleWare extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['token'=>false,'message' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['token'=>false,'message' => 'Token is Expired']);
            }else{
                return response()->json(['token'=>false,'message' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
