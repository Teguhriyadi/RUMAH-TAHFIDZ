<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function layouts()
    {
        return view("app.landing.layouts.template");
    }
}
