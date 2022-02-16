<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (Auth::attempt(['telepon' => $request->telepon, 'password' => $request->password])) {
            $data = [
                'nama' => Auth::user()->nama,
                'alamat' => Auth::user()->alamat,
                'email' => Auth::user()->email,
                'telepon' => Auth::user()->telepon,
            ];
            return response()->json(['message' => 'Login Success!', 'data' => $data], 200);
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
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'id_role' => 3
        ]);

        if ($cek) {
            $data = [
                'message' => 'Create Success!'
            ];
        } else {
            $data = [
                'message' => 'Create Failed!'
            ];
        }

        return response()->json($data, 200);
    }
}
