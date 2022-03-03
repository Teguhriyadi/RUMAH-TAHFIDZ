<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        return view("app.administrator.kontak.index");
    }
}
