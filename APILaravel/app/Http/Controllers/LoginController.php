<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view("app.auth.v_login");
    }

    public function loginProses(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $validated = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return response()->json([
                'message' => 'Login Success',
            ], 200);
        } else {
            return response()->json(['message' => 'Login Failed!'], 400);
        }
    }
}
