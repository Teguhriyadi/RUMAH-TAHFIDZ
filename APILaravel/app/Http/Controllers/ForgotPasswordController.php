<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view("app.auth.v_forgot_password");
    }

    public function store(Request $request)
    {
        $data = User::where('email', $request->email)->first();

        if ($data) {
            // DB::from()
            Mail::to($request->email)->send(new ResetPasswordMail($request->email));

            return redirect('app/login')->with('message', 'Link aktivasi berhasil terkirim ke alamat email ' . $request->email);
        }
    }
}
