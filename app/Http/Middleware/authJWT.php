<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class authJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::toUser($request->input('token'));
        } catch (Exception $e) {

            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {

                return response()->json(['result' =>false,'errors' => 'Token invalido'], 500);
                
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {

                return response()->json(['result' =>false,'errors' => 'Token expiró'], 500);
                
            } else {

                return response()->json(['result' =>false,'errors' => 'Token es requerido'], 500);
            }
        }
        return $next($request);
    }
}
