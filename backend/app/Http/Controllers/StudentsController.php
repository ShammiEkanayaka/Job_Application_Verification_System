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
        $user->reg = $request->input('reg');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->pass = $request->input('pass');
        $user->tel = $request->input('tel');
        $user->nic = $request->input('nic');
        $user->loc = $request->input('loc');
        $user->dob = $request->input('dob');
        $user->course = $request->input('course');
        $user->level = $request->input('level'); 
        $user->gpa = $request->input('gpa');
        $user->degree = $request->input('degree');
        $user->duration = $request->input('duration');
        $user->achiev = $request->input('achiev');
        $user->p1 = $request->input('p1');
        $user->p2 = $request->input('p2');
        $user->linkedin = $request->input('linkedin');
        $user->github = $request->input('github');

        if($request->image == null){
            
        }
        else{
            $expl = explode(',',$request->image);
            $decode = base64_decode($expl[1]);

            if(str_contains($expl[0],'png')){
                $exte  = 'png';
            }else{
                $exte = 'jpg';
            }

            $currenttime = \Carbon\Carbon::now()->timestamp;//str_random(10);
            $filename = $currenttime.'.'.$exte;
            $filepath = public_path().'/Profile_Pic/'.$filename;
            file_put_contents($filepath,$decode);
            
            $user->image = $filename;
        }

        $user->save();
        return response()->json(['message'=>$user],201);
    }

    public function getUser(){

        $allUser = Students::all();
        return response()->json(['allUser'=>$allUser],200);

    }

    public function getUser1($index){

        $User = DB::table('Students')->where('index', '=', $index)->first();

        $response = [
            'user'=>$User
        ];

        return response()->json([$response],200);

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

            if($request->image == $User->first()->image){
                $filename = $request->image;
                
            }
            /* elseif($request->image == $User->first()->image){
                $filename = $request->image;
            } */
            else{
                
                $expl = explode(',',$request->image);
                $decode = base64_decode($expl[1]);
    
                if(str_contains($expl[0],'png')){
                    $exte  = 'png';
                }else{
                    $exte = 'jpg';
                }
    
                $currenttime = \Carbon\Carbon::now()->timestamp;//str_random(10);
                $filename = $currenttime.'.'.$exte;
                $filepath = public_path().'/Profile_Pic/'.$filename;
                file_put_contents($filepath,$decode);
            }

            $User->update([
                'index' => $request->input('index'),
                'reg' => $request->input('reg'),
                'pass' => $request->input('pass'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'tel' => $request->input('tel'),
                'nic' => $request->input('nic'),
                'loc' => $request->input('loc'),
                'dob' => $request->input('dob'),
                'course' => $request->input('course'),
                'level' => $request->input('level'),
                'gpa' => $request->input('gpa'),
                'degree' => $request->input('degree'),
                'duration' => $request->input('duration'),
                'achiev' => $request->input('achiev'),
                'p1' => $request->input('p1'),
                'p2' => $request->input('p2'),
                'linkedin' => $request->input('linkedin'),
                'github' => $request->input('github'),
                'image' => $filename,

                'regb' => $request->input('regb'),
                'nameb' => $request->input('nameb'),
                'emailb' => $request->input('emailb'),
                'telb' => $request->input('telb'),
                'nicb' => $request->input('nicb'),
                'locb' => $request->input('locb'),
                'dobb' => $request->input('dobb'),
                'courseb' => $request->input('courseb'),
                'levelb' => $request->input('levelb'),
                'gpab' => $request->input('gpab'),
                'degreeb' => $request->input('degreeb'),
                'durationb' => $request->input('durationb'),
                'achievb' => $request->input('achievb'),
                'p1b' => $request->input('p1b'),
                'p2b' => $request->input('p2b'),
                'linkedinb' => $request->input('linkedinb'),
                'githubb' => $request->input('githubb')
            ]);
    
            return response()->json(['message'=>$User->first()],200);
     }
    }
}
