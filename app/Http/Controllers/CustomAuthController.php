<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $response = Http::post('http://km-al-api.test/api/login', [
            'email' => $email,
            'password' => $password
        ]);

        session(['token' => $response->json()['access_token']]);

        return redirect('home')->with('message', 'Login details are not valid');
    }

    public function logout()
    {
        Session::flush();

        return redirect('login');
    }
}
