<?php

namespace App\Http\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\UniqueConstraintViolationException;

class RegisterController extends Controller
{
    public function register(Request $request) : JsonResponse {

        $input = $request->all();

        $validator = Validator::make(
            $input,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|between:6,12',
                'c_password' => 'required|same:password',
            ]
        );

        if ( $validator->fails() ) {
            return $this->sendResponse(['success' => false, 'message' => $validator->errors(), 'code' => 422]);
        }

        $input['password'] = bcrypt($input['password']);
        try {
            $user = User::create($input);
        } catch (UniqueConstraintViolationException) {
            return $this->login($request);
        }

        $response = [
            'token' => $user->createToken('laravel-api')->accessToken,
            'user' => $user,
        ];
        return $this->sendResponse(['success' => true, 'data' => $response, 'code' => 200]);
        
    }

    public function login(Request $request) : JsonResponse {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $response = [
                'token' => $user->createToken('laravel-api')->accessToken,
                'user' => $user,
            ];
            return $this->sendResponse(['success' => true, 'data' => $response, 'code' => 200]);
        } else {
            return $this->sendResponse(['success' => false, 'message' => 'Unauthenticated', 'code' => 401]);
        }
    }
}
