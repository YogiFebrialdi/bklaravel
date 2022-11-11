<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Datasiswa;
use Illuminate\Http\Request;



class DatasiswaController extends Controller
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
            $data = Datasiswa::sortable()
            ->where('datasiswa.nis', 'like', '%'. $cari. '%')
            ->orWhere('datasiswa.nama', 'like', '%'. $cari. '%')
            ->paginate(5)->fragment('datasiswa');
        }else{
            $data =  Datasiswa::sortable()->paginate(5)->fragment('datasiswa');
        }

    //    $data = Datasiswa::sortable()->paginate(5)->fragment('datasiswa');
    //     return view('Datasiswa.datasiswa', compact('data'));
        return view('Datasiswa.datasiswa')->with([
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
        $kelas = Kelas::all();
        return view('Datasiswa.create-datasiswa')->with([
            'kelas' => $kelas,
        ]);
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
    //     'nis' => $request->nis,
    //     'nama' => $request->nama,
    //     'jk' => $request->jk,
    //     'ttl' => $request->ttl,
    //     'alamat' => $request->alamat,
    //     'walimurid' => $request->walimurid,
    //     'telepon' => $request->telepon,
    //    ]);
    Datasiswa::create($request->all());
    return redirect()->route('datasiswa')->with('success','Data Berhasil Ditambahkan');

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
        $data = Datasiswa::findOrFail($id);
        return view('Datasiswa.edit-datasiswa', compact('data'));
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
        $data = Datasiswa::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('datasiswa')->with('success','Data Berhasil Di Update');
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
