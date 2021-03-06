<?php

namespace App\Http\Controllers;

use App\Models\LastLogin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Token;

class AppController extends Controller
{
    public function layouts()
    {
        return view("app.administrator.layouts.template");
    }

    public function home()
    {
        $data = [
            'user_login' => LastLogin::where('id_user', Auth::user()->id)->latest()->limit(4)->get()
        ];

        return view("app.administrator.v_home", $data);
    }

    public function informasi_login()
    {
        $data = [
            'user_login' => LastLogin::where('id_user', Auth::user()->id)->latest()->limit(4)->get()
        ];

        return view("app.administrator.informasi_login.index", $data);
    }
}
