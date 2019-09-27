<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(Request $request, $userId)
    {
        $user = User::find($userId);

        if($user){
            return response()->json($user);
        }

        return response()->json(['message'=>'User not found!'], 404);
    }
}
