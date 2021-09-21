<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api')
            ->only('logout', 'editProfile', 'updateProfile');
    }

    public function register(Request $request) {
        try {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|between:6,25|confirmed'
            ]);
        } catch (ValidationException $e) {
        }

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|between:6,25'
        ]);


        $user = User::whereEmail($request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
           $user->api_token = Str::random(40);
           $user->save();
            return response()->json([
                'success' => true,
                'user' => $user->info()
            ]);
        }
        return response()->json([
            'errors' => [
                'email' => 'These credentials do not match our records.'
            ]
        ], 422);;
    }
}
