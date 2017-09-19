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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
	$token = JWTAuth::getToken();
	$user = JWTAuth::toUser($token);

	return $user;


});

// https://www.youtube.com/watch?v=GyLAk6h8RW8&list=PLZAiN3wmUtzUHBDUI6F5Ks3t-U-wVRIV2&index=5

Route::post('/authenticate', [
	'uses' => 'ApiAuthController@authenticate'
]); 

Route::post('/ ', [
	'uses' => 'ApiAuthController@register'
]); 