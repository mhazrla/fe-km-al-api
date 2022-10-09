<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response =  Http::get('http://km-al-api.test/api/pers');
        if ($response->successful()) {
            $pers = json_decode($response, true);
            $pers = $pers['pers'];
        }
        return view('pers.home', ['pers' => $pers]);
    }

    public function create()
    {
        return view('pers.create');
    }

    public function store()
    {
        return view('profile.edit');
    }
}
