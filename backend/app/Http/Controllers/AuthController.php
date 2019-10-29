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
    
    public function login(Request $request)
    {
        $request->validate([
            'index'=>'required|exists:users,index',
            'password'=>'required'
        ]);

        if(Auth::guard('web')->attempt(['index'=>$request->index, 'password'=>$request->password])){
            $user = Auth::guard('web')->user();
            if($user->status == 1){
                $token = $user->createToken($user->index.'_'.now());

                return response()->json([
                    'token' => $token
                ]);  
            }
            else
            {
                return response()->json(['error'=>'User has been deactivated'], 423);
            }
            
        }
        else {
            return response()->json(['error'=>'Invalied password'], 401);
        }
    }
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->delete();
    
        $response = 'You have been succesfully logged out!';
        return response($response, 200);
    
    }
}
