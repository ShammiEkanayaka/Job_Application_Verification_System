<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use Illuminate\Support\Facades\DB;

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

    public function getUser(){

        $allUser = Students::all();
        return response()->json(['allUser'=>$allUser],200);

    }

    public function deleteUser($index){

        $User = DB::table('Students')->where('index', '=', $index);

        if($User->first() == null){
            return response()->json(['message'=>"User not found"],404);
        }
        else{

            $User->delete();
            return response()->json(['message'=> "User deleted successfully"],201);
        }
    }

    public function editUser(Request $request, $index){

        $User = DB::table('Students')->where('index', '=', $index);
 
        //$User = Students::where('index', '=', $index);
         
         if($User->first() == null){
             return response()->json(['message'=>"User not found"],404);
         }
         else{
            $User->update([
                'index' => $request->input('index'),
                'pass' => $request->input('pass'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'tel' => $request->input('tel'),
                'nic' => $request->input('nic'),
                'loc' => $request->input('loc'),
                'dob' => $request->input('dob'),
                'course' => $request->input('course'),
                'gpa' => $request->input('gpa'),
                'degree' => $request->input('degree'),
                'duration' => $request->input('duration'),
                'achiev' => $request->input('achiev'),
                'p1' => $request->input('p1'),
                'p2' => $request->input('p2'),
                'linkedin' => $request->input('linkedin'),
                'github' => $request->input('github'),
            ]);
    
            return response()->json(['message'=>$User->first()],200);
     }
    }
}
