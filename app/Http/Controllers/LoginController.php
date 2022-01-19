<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            //$user = User::where('email', $request->email)->first();
            //$token = Auth::user()->createToken('my-app-token')->plainTextToken;

            $response = [
                'user' => Auth::user(),
                //'token' => $token,
                'response' => 'success'

            ];
            return response()->json($response, 200);
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorect.']
        ]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
