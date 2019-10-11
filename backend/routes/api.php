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

Route::middleware('auth:api')->group(function () {
    Route::get('user/{userId}/detail', 'UserController@show');
    Route::get('/getUser1/{id}',['uses'=>'StudentsController@getUser1']); //student get details himself
});

Route::middleware('auth:admin-api')->group(function () {
    Route::get('admin', 'AdminController@show');
    Route::get('/getUser',['uses'=>'StudentsController@getUser']);
    Route::get('/getUserA/{id}',['uses'=>'StudentsController@getUser1']);
});

Route::post('admin/login', 'Auth\AdminLoginController@login');

Route::get('/guestUser/{id}',['uses'=>'StudentsController@guestUser']);

//Route::post('register','AuthController@register');

Route::post('login','AuthController@login');

Route::middleware('auth:api,admin-api')->group(function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

//Route::get('logout','AuthController@logout');


// student table
Route::post('/addUser',[

    'uses'=>'StudentsController@postUser'
]);

Route::delete('/deleteUser/{index}',[

    'uses'=>'StudentsController@deleteUser'

]);

Route::put('/updateUserU/{index}',[        //user update his details

    'uses'=>'StudentsController@updateUserU'

]);

Route::put('/editUser/{index}',[

    'uses'=>'StudentsController@editUser'

]);

Route::put('/editUserStatus/{index}',[

    'uses'=>'StudentsController@editUserStatus'

]);

Route::get('/GenerateLink/{index}',[

    'uses'=>'StudentsController@GenerateLink'

]);