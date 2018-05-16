<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;

class VerifyClient
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
        try{
            //verificar si el cliente esta registrado
            $app=Client::where('api_key',$request->api_key)->first();
//            echo $request->api_key;
            if($app){
                //verificar si el estatus es activo
                if($app->status!='ACTIVO'){
                    return response()->json(['result' =>false,'errors' => 'Este Cliente se encuentra '.strtolower($app->status)], 500);
                }
            }
            else{
                return response()->json(['result' =>false,'errors' => 'Api key Invalido '.$request->api_key], 500);
            }
            
        } catch (Exception $ex) {

        }
        return $next($request);
    }
}
