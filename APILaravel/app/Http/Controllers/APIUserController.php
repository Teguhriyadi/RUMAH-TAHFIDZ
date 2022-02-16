<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIUserController extends Controller
{
    public function index()
    {
        return view("/app/administrator/users/index");
    }
}
