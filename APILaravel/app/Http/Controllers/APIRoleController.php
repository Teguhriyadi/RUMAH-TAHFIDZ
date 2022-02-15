<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class APIRoleController extends Controller
{
    public function tampil_data()
    {
        $data_role = Role::orderBy("id", "DESC")->get();

    	return response()->json([
    		'success' => true,
    		'message' => 'List Data Post',
    		'data' => $data_role
    	], 200);
    }

    public function index()
    {
        return view("/app/administrator/role/index");
    }
}
