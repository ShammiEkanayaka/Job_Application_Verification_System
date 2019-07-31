<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentsController extends Controller
{
    //
    public function postUser(Request $request){
        $user = new Students();

        $user->name = $request->input('name');
        $user->save();

        return response()->json(['message'=>$user],201);
    }
}
