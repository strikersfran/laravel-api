<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use JWTAuthException;

class AuthController extends Controller {

    private $user;
    private $jwtauth;

    public function __construct(User $user, JWTAuth $jwtauth) {
        $this->user = $user;
        $this->jwtauth = $jwtauth;
    }

    public function register(RegisterRequest $request) {
        $newUser = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);

        if (!$newUser) {
            return response()->json(['result'=>'Falló al crear el nuevo usuario'], 500);
        }
        
        return response()->json(['result' =>'Usuario creado con exito!!']);
    }

    public function login(Request $request) {
        // Creamos las reglas de validación
        $rules = [            
            'email'=> 'required','password' =>'required'
        ];
        
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->all()],400);
        }
        
        try {
            $token = $this->jwtauth->attempt($request->only('email', 'password'));
            if (!$token) {
                return response()->json(['message' => 'Credenciales invalidos'], 400);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['message' => 'Fallo al crear el Token'], 500);
        }

        return response()->json(['token'=>$token]);
    }
    
    public function logout(Request $request) {
        
        return response()->json(['token'=>$token]);
    }

}
