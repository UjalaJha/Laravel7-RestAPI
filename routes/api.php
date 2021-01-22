<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:api'], function () {

Route::get('/getcourses','CourseAPIController@index');
Route::get('/getcoursebyid/{id}','CourseAPIController@show');
Route::post('/addcourses','CourseAPIController@create');
Route::delete('/deletecourse/{id}','CourseAPIController@destroy');
Route::put('/updatecourse/{id}','CourseAPIController@update');
Route::post('/logout', 'API\AuthController@logout');

});

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');