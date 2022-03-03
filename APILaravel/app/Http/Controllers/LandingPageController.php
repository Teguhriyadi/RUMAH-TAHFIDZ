<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function layouts()
    {
        return view("app.landing.layouts.template");
    }

    public function home()
    {
        return view("app.landing.home");
    }

    public function tentang_kami()
    {
        return view("app.landing.tentang_kami.index");
    }

    public function kontak()
    {
        return view("app.landing.kontak.index");
    }
}
