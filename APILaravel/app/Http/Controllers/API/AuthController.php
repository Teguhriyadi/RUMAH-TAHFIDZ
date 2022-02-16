<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'telepon' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $validated = [
            'telepon' => $request->telepon,
            'password' => $request->password
        ];

        if (Auth::attempt($validated)) {
            $data = [
                'nama' => Auth::user()->nama,
                'alamat' => Auth::user()->alamat,
                'email' => Auth::user()->email,
                'telepon' => Auth::user()->telepon,
            ];

            $user = User::where('telepon', $request->telepon)->first();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login Success',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'data' => $data
            ], 200);
        } else {
            return response()->json(['message' => 'Login Failed!'], 400);
        }
    }

    public function register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'telepon' => 'required|max:15|unique:users',
            'email' => 'email',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = User::create([
            'id' => time(),
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'id_role' => 3
        ]);

        $token = $cek->createToken('auth_token')->plainTextToken;

        if ($cek) {
            $data = [
                'message' => 'Create Success!',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ];
        } else {
            $data = [
                'message' => 'Create Failed!'
            ];
        }

        return response()->json($data, 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout Success!'
        ], 200);
    }
}
