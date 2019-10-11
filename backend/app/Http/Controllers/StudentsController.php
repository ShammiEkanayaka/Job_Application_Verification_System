<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\User;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    //
    public function postUser(Request $request){

        $request->validate([
            'index'=>'required|unique:users,index',
        ]);

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
        $user->facebook = $request->input('facebook');

        $currenttime = \Carbon\Carbon::now()->timestamp;
        $str  = str_random(10);
        $user->AccessLink = $currenttime.'-'.$str;

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

        User::create([
            'index'=>$request->index,
            //'name'=>$request->name,
            'password'=>bcrypt($request->pass)
        ]);

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

    public function guestUser($code){

        $User = DB::table('Students')->where('AccessLink', '=', $code)->first();

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

            $User2 = DB::table('users')->where('index', '=', $index);
            $User2->delete();

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

            if(($request->image == $User->first()->image)||($request->image == null)){
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
                'facebook' => $request->input('facebook'),
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
                'githubb' => $request->input('githubb'),
                'facebookb' => $request->input('facebookb')
            ]);

            $User2 = DB::table('users')->where('index', '=', $index);   //search index in user table
            $User2->update([
                'password'=>bcrypt($request->pass)
            ]);

            return response()->json(['message'=>$User->first()],200);
     }
    }

    public function updateUserU(Request $request, $index){        //user update his details

        $User = DB::table('Students')->where('index', '=', $index);
 
        //$User = Students::where('index', '=', $index);
         
         if($User->first() == null){
             return response()->json(['message'=>"User not found"],404);
         }
         else{

            if(($request->image == $User->first()->image)||($request->image == null)){
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

            if($request->name != $User->first()->name){
                $User->update([
                    'nameb' => '0']);
            }
            if($request->email != $User->first()->email){
                $User->update([
                    'emailb' => '0']);
            }
            if($request->tel != $User->first()->tel){
                $User->update([
                    'telb' => '0']);
            }
            if($request->nic != $User->first()->nic){
                $User->update([
                    'nicb' => '0']);
            }
            if($request->loc != $User->first()->loc){
                $User->update([
                    'locb' => '0']);
            }
            if($request->dob != $User->first()->dob){
                $User->update([
                    'dobb' => '0']);
            }
            if($request->course != $User->first()->course){
                $User->update([
                    'courseb' => '0']);
            }
            if($request->level != $User->first()->level){
                $User->update([
                    'levelb' => '0']);
            }
            if($request->gpa != $User->first()->gpa){
                $User->update([
                    'gpab' => '0']);
            }
            if($request->degree != $User->first()->degree){
                $User->update([
                    'degreeb' => '0']);
            }
            if($request->duration != $User->first()->duration){
                $User->update([
                    'durationb' => '0']);
            }
            if($request->achiev != $User->first()->achiev){
                $User->update([
                    'achievb' => '0']);
            }
            if($request->p1 != $User->first()->p1){
                $User->update([
                    'p1b' => '0']);
            }
            if($request->p2 != $User->first()->p2){
                $User->update([
                    'p2b' => '0']);
            }
            if($request->linkedin != $User->first()->linkedin){
                $User->update([
                    'linkedinb' => '0']);
            }
            if($request->github != $User->first()->github){
                $User->update([
                    'githubb' => '0']);
            }
            if($request->facebook != $User->first()->facebook){
                $User->update([
                    'facebookb' => '0']);
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
                'facebook' => $request->input('facebook'),
                'image' => $filename
                ]);

            $User2 = DB::table('users')->where('index', '=', $index);   //search index in user table
            $User2->update([
                'password'=>bcrypt($request->pass) //update password in user table
            ]);

            //return response()->json(['message'=>$User->first()],200);
            return response()->json(['message'=>$request->name,$User->first()->name],200);
     }
    }

    public function editUserStatus(Request $request, $index){

        $User = DB::table('Students')->where('index', '=', $index);
        
        //$User = Students::where('index', '=', $index);
         
         if($User->first() == null){
             return response()->json(['message'=>"User not found"],404);
         }
         else{

            $User->update([
                'status' => $request->input('status')
            ]);

            $User2 = DB::table('users')->where('index', '=', $index);   //search index in user table
            $User2->update([
                'status'=>$request->status
            ]);
    
            return response()->json(['message'=>$User->first()],200);
     }
    }

    public function GenerateLink(Request $request, $index){

        $User = DB::table('Students')->where('index', '=', $index);
         
         if($User->first() == null){
             return response()->json(['message'=>"User not found"],404);
         }
         else{

            $currenttime = \Carbon\Carbon::now()->timestamp;
            $str  = str_random(10);
            $AccessLink = $currenttime.'-'.$str;

            $User->update([
                'AccessLink' => $AccessLink
            ]);
    
            return response()->json(['user'=>$User->first()],200);
     }
    }
}
