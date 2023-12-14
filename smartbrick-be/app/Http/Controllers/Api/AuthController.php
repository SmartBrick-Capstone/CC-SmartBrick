<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            'password_confirmation' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Registration Successfully!',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed! Incorrect E-mail or Password.',
            ], 401);
        }

        $token = $this->respondWithToken($token);
        $loginResult = Auth::guard('api')->user();
        $loginResult['token'] = $token;
        return response()->json([
            'success' => true,
            'message' => 'Successfully logged in!',
            'loginResult' => $loginResult
        ]);
    }

    protected function respondWithToken($token)
    {
        return $token;
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out!'
        ]);
    }
}