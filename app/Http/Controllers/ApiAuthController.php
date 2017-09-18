<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;  

class ApiAuthController extends Controller
{
    public function authenticate () {
 
    	$credentials = request()->only('email','password');

	   	try {
			$token = JWTAuth::attempt($credentials);

			if (!$token) {
				return response()->json(['error'=>'invalid_credentials'], 401);
			}
    	}

    	catch (JWTException $e) {
    		return response()->json(['error'=>'something_went_wrong'], 500);

    	}

    	return response()->json(['token'=> $token], 200);


    }
    
}
