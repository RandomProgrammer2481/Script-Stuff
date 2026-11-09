<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'The provided credentials do not match our records.',
                'errors'  => ['email' => ['The provided credentials do not match our records.']],
            ], 422);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'succesfully logged in']);
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return response()->json(['message' => 'succesfully logged out']);
    }

    public function me(Request $request) {
        if (Auth::check()) { 
            return $request->user();
        }
        else {
            return response(null, 401);
            }
        }
}
