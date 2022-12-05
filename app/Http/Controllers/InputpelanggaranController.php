<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Akunguru;
use App\Models\Datasiswa;
use App\Models\Inputpelanggaran;
use App\Models\Benpel;
use App\Models\Historypelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputpelanggaranController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {


        $cari = $request->query('cari');
        if(!empty($cari)){
            $data = Inputpelanggaran::join("users", "users.id", "=", "datasiswa.user_id")
            ->where("nis", 'LIKE', '%'. $cari. '%')
            ->orWhere("name", 'like', '%'. $cari. '%')
            ->paginate(5)->fragment('inputpelanggaran');
        }else{
            $data =  Inputpelanggaran::with('kelas')->sortable()->paginate(5)->fragment('inputpelanggaran');
        }

        //    $data = Datasiswa::sortable()->paginate(5)->fragment('datasiswa');
        //     return view('Datasiswa.datasiswa', compact('data'));
        return view('Inputpelanggaran.inputpelanggaran')->with([
            'data' => $data,
            'cari' => $cari,
        ]);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($id)
    {
        // $kelas = Kelas::all();
        $benpel = Benpel::all();
        $guru = Akunguru::all();
        $data = Datasiswa::findOrFail($id);
        return view('Inputpelanggaran.create-pelanggaran')->with([
            'benpel' => $benpel,
            // 'kelas' => $kelas,
            'data' => $data,
            'guru' => $guru,
        ]);;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $benpel = Benpel::where("id", $request->benpel_id)->first();

        $siswa = Datasiswa::where("nis", $request->nis)->first();

        Historypelanggaran::create([
            "siswa_id" => $siswa->id,
            "kelas" => $request->kelas,
            "benpel_id" => $request->benpel_id,
            "guru_id" => Auth::user()->id,
            "tgl" => $request->tgl
        ]);

        return redirect("/historypelanggaran")->with('success','Data Berhasil Ditambahkan');

        //return redirect('datasiswa');
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
        $data = Inputpelanggaran::findOrFail($id);
        return view('Inputpelanggaran.edit-pelanggaran', compact('data'));
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
        $data = Inputpelanggaran::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('historypelanggaran')->with('success','Data Berhasil Di Update');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $data = Datasiswa::findOrFail($id);
        $data->delete();
        return back()->with('success','Data Berhasil Di Hapus');;
    }
}
