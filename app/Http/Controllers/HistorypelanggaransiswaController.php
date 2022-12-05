<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use App\Models\Inputpelanggaran;
use App\Models\Historypelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorypelanggaransiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $siswa = Datasiswa::where("user_id", Auth::user()->id)->first();

        $data = Historypelanggaran::where("siswa_id", $siswa->id)->paginate(5);

        return view('Historypelanggaran.historypelanggaransiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     Inputpelanggaran::create($request->all());
    // return redirect()->route('historypelanggaran')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Inputpelanggaran::findOrFail($id);
        // $data->delete();
        // return back()->with('success','Data Berhasil Di Hapus');;
    }
}
