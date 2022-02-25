<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIUserController extends Controller
{
    public function index()
    {
        $data = [
            "data_role" => Role::get()
        ];

        return view("/app/administrator/users/index", $data);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama" => "required",
            "email" => "required",
            "password" => "required",
            "id_role" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = Role::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "id_role" => $request->id_role
        ]);

        if ($cek) {
            $data = [
                'message' => 'Create Success!',
                'status' => true
            ];
        } else {
            $data = [
                'message' => 'Create Failed!',
                'status' => false
            ];
        }

        return response()->json($data, 200);
    }
}
