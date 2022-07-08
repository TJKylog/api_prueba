<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CredentialInfoController extends Controller
{
    public function getCredentialInfo(Request $request)
    {
        $people = Auth::guard('api')->user();
        return response()->json([
            'name' => $people->name,
            'email' => $people->email
        ]);
    }

    public function getExtraInfo(Request $request)
    {
        
    }
}
