<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePerRequest;
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
        $pers = null;
        $response =  Http::get('http://km-al-api.test/api/pers');
        if ($response->successful()) {
            $pers = json_decode($response, true);
            $pers = $pers['pers'];
        }
        return view('pers.home', ['pers' => $pers]);
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

        $response->throw();
        if ($response->clientError()) {
            return 'clientError';
        }

        if ($response->serverError()) {
            return 'serverError';
        }

        return to_route('home')->with('status', 'New data has been added.');
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

        // dd($status, $title, $per);


        return view('pers.edit', ['data' => $per, 'titles' => $title, 'statuses' => $status]);
    }

    public function update(Request $request)
    {
        $id = $request->per_id;
        Http::patch('http://km-al-api.test/api/pers/' . $id, [
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
