<?php

namespace App\Http\Controllers;

use App\Models\Inputpelanggaran;
use Illuminate\Http\Request;

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
            $data = Inputpelanggaran::sortable()
            ->where('datasiswas.nisn', 'like', '%'. $cari. '%')
            ->orWhere('datasiswas.nama', 'like', '%'. $cari. '%')
            ->paginate(5)->fragment('inputpelanggaran');
        }else{
            $data =  Inputpelanggaran::sortable()->paginate(5)->fragment('inputpelanggaran');
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
    public function create()
    {
        return view('Inputpelanggaran.create-pelanggaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd(request->all());
    //    datasiswa::create([
    //     'nisn' => $request->nisn,
    //     'nama' => $request->nama,
    //     'jk' => $request->jk,
    //     'ttl' => $request->ttl,
    //     'alamat' => $request->alamat,
    //     'walimurid' => $request->walimurid,
    //     'telepon' => $request->telepon,
    //    ]);
    Inputpelanggaran::create($request->all());
    return redirect()->route('historypelanggaran')->with('success','Data Berhasil Ditambahkan');

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
