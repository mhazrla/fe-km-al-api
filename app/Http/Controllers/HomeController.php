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
        $response =  Http::get('https://km-al-api.dev/api/pers');
        if ($response->successful()) {
            $pers = json_decode($response, true);
            $pers = $pers['pers'];
        }
        $title = null;
        $titles =  Http::get('https://km-al-api.dev/api/title');
        if ($titles->successful()) {
            $title = json_decode($titles, true);
            $title = $title['data'];
        }
        return view('pers.home', ['pers' => $pers, 'titles' => $title]);
    }

    public function create()
    {
        $title = null;
        $titles =  Http::get('https://km-al-api.dev/api/title');
        if ($titles->successful()) {
            $title = json_decode($titles, true);
            $title = $title['data'];
        }

        $status = null;
        $statuses =  Http::get('https://km-al-api.dev/api/status');
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
                ->post('https://km-al-api.dev/api/pers', $request->all());
        } else {
            $response =  Http::post('https://km-al-api.dev/api/pers', $request->all());
        }


        return to_route('home')->with('status', 'New data has been added.');
    }

    public function edit($id)
    {
        if ($id) {
            $response =  Http::get('https://km-al-api.dev/api/pers/' . $id);
            if ($response->successful()) {
                $per = json_decode($response, true);
                $per = $per['per'];
            }
        }

        $title = null;
        $titles =  Http::get('https://km-al-api.dev/api/title');
        if ($titles->successful()) {
            $title = json_decode($titles, true);
            $title = $title['data'];
        }

        $status = null;
        $statuses =  Http::get('https://km-al-api.dev/api/status');
        if ($statuses->successful()) {
            $status = json_decode($statuses, true);
            $status = $status['data'];
        }

        // dd($status, $title, $per);


        return view('pers.edit', ['data' => $per, 'titles' => $title, 'statuses' => $status]);
    }

    public function update(Request $request)
    {
        $id = $request->per_id;
        Http::patch('https://km-al-api.dev/api/pers/' . $id, [
            'nama' => $request->nama,
            'nrp' => $request->nrp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'title_id' => $request->title_id,
            'status_id' => $request->status_id,
        ]);
        return to_route('home')->with('status', 'New data has been added.');
    }
}
