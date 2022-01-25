<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller 
{
    public function index(Request $request)
    {
        /**
         * create API_token
         */

    }
    
	public function login(Request $request) {
		/**
		 * Return
		 * {
		"user": {
		"id": 6,
		"name": "test02",
		"email": "test02@gmail.com",
		"email_verified_at": null,
		"api_token": null,
		"phone": "123123123",
		"role_id": 1,
		"created_at": "2022-01-24T03:13:14.000000Z",
		"updated_at": "2022-01-24T03:13:14.000000Z"
		},
		"token": "6|2qecJGeaUIy1VTfldcrrSkwgXnj6LTT206Ey4d8r"
		}
		 */
		$user = User::where('email', $request->email)->first();

		if (!$user || !Hash::check($request->password, $user->password)) {
			return response([
				'message' => ['These credentials do not match our records.'],
			], 404);
		}

		$token = $user->createToken('my-app-token')->plainTextToken;

		$response = [
			'user' => $user,
			'token' => $token,
		];

		return response($response, 201);
	}
}
