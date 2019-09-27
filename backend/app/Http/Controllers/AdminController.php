<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\User;

class AdminController extends Controller
{
    public function show()
    {
        return response()->json(['message'=>'Admin dashboard']);
    }
}
