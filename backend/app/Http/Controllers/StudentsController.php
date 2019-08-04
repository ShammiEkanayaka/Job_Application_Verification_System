<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentsController extends Controller
{
    //
    public function postUser(Request $request){
        $user = new Students();

        $user->index = $request->input('index');
        $user->pass = $request->input('pass');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->tel = $request->input('tel');
        $user->nic = $request->input('nic');
        $user->loc = $request->input('loc');
        $user->dob = $request->input('dob');
        $user->course = $request->input('course');
        $user->gpa = $request->input('gpa');
        $user->degree = $request->input('degree');
        $user->duration = $request->input('duration');
        $user->achiev = $request->input('achiev');
        $user->p1 = $request->input('p1');
        $user->p2 = $request->input('p2');
        $user->linkedin = $request->input('linkedin');
        $user->github = $request->input('github');
        $user->save();

        return response()->json(['message'=>$user],201);
    }
}
