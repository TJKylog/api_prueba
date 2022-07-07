<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\People;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    /**
     * Inicio de sesión y creación de token
     */
    public function login(Request $request)
    {
        $people = People::where('id',$request->id)->first();
        if(isset($people)) {
            Auth::guard('people')->loginUsingId($people->id);
            $tokenResult = $people->createToken('Token');

            $token = $tokenResult->accessToken;

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
            ]);
        }
        else{
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }
    }
}
