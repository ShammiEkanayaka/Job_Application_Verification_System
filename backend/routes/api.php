<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/addUser',[

    'uses'=>'StudentsController@postUser'
]);

Route::get('/getUser',[

    'uses'=>'StudentsController@getUser'

]);

Route::get('/getUser1/{id}',[

    'uses'=>'StudentsController@getUser1'

]);

Route::delete('/deleteUser/{index}',[

    'uses'=>'StudentsController@deleteUser'

]);

Route::put('/editUser/{index}',[

    'uses'=>'StudentsController@editUser'

]);

Route::put('/editUserStatus/{index}',[

    'uses'=>'StudentsController@editUserStatus'

]);