<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StorePerRequest;

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
        $pers = null;
        $response =  Http::get('http://km-al-api.test/api/pers');
        if ($response->successful()) {
            $pers = json_decode($response, true);
            $pers = $pers['pers'];
        }
        $title = null;
        $titles =  Http::get('http://km-al-api.test/api/title');
        if ($titles->successful()) {
            $title = json_decode($titles, true);
            $title = $title['data'];
        }

        return view('pers.home', ['pers' => $pers, 'titles' => $title]);
    }

    public function create()
    {
        $title = null;
        $titles =  Http::get('http://km-al-api.test/api/title');
        if ($titles->successful()) {
            $title = json_decode($titles, true);
            $title = $title['data'];
        }

        $status = null;
        $statuses =  Http::get('http://km-al-api.test/api/status');
        if ($statuses->successful()) {
            $status = json_decode($statuses, true);
            $status = $status['data'];
        }

        return view('pers.create', ['titles' => $title, 'statuses' => $status]);
    }

    public function store(StorePerRequest $request)
    {

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = fopen($request->file('foto'), 'r');

            $response =  Http::attach('foto', $foto)
                ->post('http://km-al-api.test/api/pers', $request->all());
        } else {
            $response =  Http::post('http://km-al-api.test/api/pers', $request->all());
        }


        return to_route('home')->with('status', 'New data has been added.');
    }

    public function show($id)
    {
        if ($id) {
            $response =  Http::get('http://km-al-api.test/api/pers/' . $id);
            if ($response->successful()) {
                $per = json_decode($response, true);
                $per = $per['per'];
            }
        }

        return view('pers.detail', ['data' => $per]);
    }

    public function edit($id)
    {
        if ($id) {
            $response =  Http::get('http://km-al-api.test/api/pers/' . $id);
            if ($response->successful()) {
                $per = json_decode($response, true);
                $per = $per['per'];
            }
        }

        $title = null;
        $titles =  Http::get('http://km-al-api.test/api/title');
        if ($titles->successful()) {
            $title = json_decode($titles, true);
            $title = $title['data'];
        }

        $status = null;
        $statuses =  Http::get('http://km-al-api.test/api/status');
        if ($statuses->successful()) {
            $status = json_decode($statuses, true);
            $status = $status['data'];
        }


        return view('pers.edit', ['data' => $per, 'titles' => $title, 'statuses' => $status]);
    }

    public function update(StorePerRequest $request)
    {
        $id = $request->per_id;


        if ($request->hasFile('foto')) {
            $foto = fopen($request->file('foto'), 'r');

            $response =  Http::attach('foto', $foto)
                ->post('http://km-al-api.test/api/pers/' . $id, $request->all());
        } else {
            $response =  Http::post('http://km-al-api.test/api/pers/' . $id, $request->all());
        }

        return to_route('home')->with('status', 'New data has been added.');
    }

    public function destroy($id)
    {
        $response = Http::delete('http://km-al-api.test/api/pers/' . $id);
        // return $response->json();
        return to_route('home')->with('status', 'New data has been deleted.');
    }
}
