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
//test
Route::get('/reg/{slashData?}','StudentsController@Reg')
        ->where('slashData', '(.*)');

        //database test
Route::get('/database',['uses'=>'StudentsController@getUsers']);

Route::middleware('auth:api')->group(function () {
    Route::get('user/{userId}/detail', 'UserController@show');
    Route::get('/getUserU/{id}',['uses'=>'StudentsController@getUser']); //student get details himself
});

Route::middleware('auth:admin-api')->group(function () {
    Route::get('admin', 'AdminController@show');
    Route::get('/getUsers',['uses'=>'StudentsController@getUsers']);
    Route::get('/getUserA/{id}',['uses'=>'StudentsController@getUser']);
});

Route::post('admin/login', 'Auth\AdminLoginController@login');

Route::get('/guestUser/{id}',['uses'=>'StudentsController@guestUser']);

Route::post('login','AuthController@login');

Route::middleware('auth:api,admin-api')->group(function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
});


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