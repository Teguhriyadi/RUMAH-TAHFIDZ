<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Token;

class AppController extends Controller
{
    public function layouts()
    {
        return view("/app/administrator/layouts/template");
    }

    public function home()
    {
        $id = Auth::user()->id;
        $token = Token::where('tokenable_id', $id)->get();
        return view("/app/administrator/v_home", compact('token'));   
    }
}
