<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('guest:adminapi');
    } */

    protected function generateAccessToken($user)
    {
        $token = $user->createToken($user->email.'-'.now());

        return $token->accessToken;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required'
        ]);

        
        if(Auth::guard('adminapi')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::guard('adminapi')->user();

            $token = $user->createToken($user->email.'-'.now());

            return response()->json([
                'token' => $token
            ]);
        }
        
        return response()->json(['message' => 'invalied email or password']);
    }
    
}
