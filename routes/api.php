<?php

use Illuminate\Http\Request;
//use App\Http\Controllers\Mobile\RegisterController;

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

//Route::get("/testapi", [DeveloperController::class, 'getData']);
//Route::get('/testdata', 'DeveloperController@getData');
//Route::get('/testapi', 'Mobile\RegisterController@showData');
