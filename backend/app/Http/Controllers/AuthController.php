<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function generateAccessToken($user)
    {
        $token = $user->createToken($user->email.'-'.now());

        return $token->accessToken;
    }

    /* public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        return response()->json($user);
    } */
    public function login(Request $request)
    {
        $request->validate([
            'index'=>'required|exists:users,index',
            'password'=>'required'
        ]);

        if(Auth::guard('web')->attempt(['index'=>$request->index, 'password'=>$request->password])){
            $user = Auth::guard('web')->user();

            $token = $user->createToken($user->index.'_'.now());

            return response()->json([
                'token' => $token
            ]);
        }
    }
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->delete();
    
        $response = 'You have been succesfully logged out!';
        return response($response, 200);
    
    }
}
