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
            $angkatanDarat = $pers['angkatanDarat'];
            $angkatanUdara = $pers['angkatanUdara'];
            $angkatanLaut = $pers['angkatanLaut'];
            // $perwiraTinggi = $pers['perwiraTinggi'];
            // $perwiraMenengah = $pers['perwiraMenengah'];
            // $perwiraPertama = $pers['perwiraPertama'];
            // $bintaraTinggi = $pers['bintaraTinggi'];
            // $bintara = $pers['bintara'];
            // $tamtamaKepala = $pers['tamtamaKepala'];
            // $tamtama = $pers['tamtama'];
            $pers = $pers['pers'];
        }

        return view('pers.home', [
            'pers' => $pers,
            'angkatanDarat' => $angkatanDarat,
            'angkatanUdara' => $angkatanUdara,
            'angkatanLaut' => $angkatanLaut,
            // 'perwiraTinggi' => $perwiraTinggi,
            // 'perwiraMenengah' => $perwiraMenengah,
            // 'perwiraPertama' => $perwiraPertama,
            // 'bintaraTinggi' => $bintaraTinggi,
            // 'bintara' => $bintara,
            // 'tamtama' => $tamtama,
            // 'tamtamaKepala' => $tamtamaKepala,
        ]);
    }

    public function create()
    {
        $organization = null;
        $organizations =  Http::get('http://km-al-api.test/api/organization');
        if ($organizations->successful()) {
            $organization = json_decode($organizations, true);
            $organization = $organization['data'];
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

        return view('pers.create', ['titles' => $title, 'statuses' => $status, 'organizations' => $organization]);
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

                return view('pers.detail', ['data' => $per]);
            } else {
                return abort(404);
            }
        }
    }

    public function edit($id)
    {
        $organization = null;
        $organizations =  Http::get('http://km-al-api.test/api/organization');
        if ($organizations->successful()) {
            $organization = json_decode($organizations, true);
            $organization = $organization['data'];
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

        if ($id) {
            $response =  Http::get('http://km-al-api.test/api/pers/' . $id);
            if ($response->successful()) {
                $per = json_decode($response, true);
                $per = $per['per'];
                return view('pers.edit', ['data' => $per, 'titles' => $title, 'statuses' => $status, 'organizations' => $organization]);
            } else {
                return abort(404);
            }
        }
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
        return response()->json(['status' => 'Data berhasil dihapus']);
    }
}
