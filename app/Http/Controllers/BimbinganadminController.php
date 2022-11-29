<?php

namespace App\Http\Controllers;

use App\Models\Bimbinganadmin;
use Illuminate\Http\Request;

class BimbinganadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        $siswa = Bimbinganadmin::where('level', 'siswa')->get();
        if(!empty($cari)){
            $data = Bimbinganadmin::sortable()
            ->where('form.tglbim', 'like', '%'. $cari. '%')
            ->orWhere('form.nama', 'like', '%'. $cari. '%')
            ->orWhere('form.kelas', 'like', '%'. $cari. '%')
            ->orWhere('form.keterangan', 'like', '%'. $cari. '%')
            ->paginate(14)->fragment('bimbinganadmin');
        }else{
            $data =  Bimbinganadmin::sortable()->paginate(10)->fragment('bimbinganadmin');
        }

        return view('Formadmin.bimbinganadmin')->with([
            'data' => $data,
            'cari' => $cari,
            'siswa' => $siswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Form.create-bimbingansiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Bimbingansiswa::create($request->all());
    // return redirect()->route('bimbingansiswa')->with('success','bimbingan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = Bimbinganadmin::findOrFail($id);
        // return view('Formadmin.tanggapibimbingan', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bimbinganadmin::findOrFail($id);
        return view('Formadmin.tanggapibimbingan', compact('data'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, $id)
    {
        $data = Bimbinganadmin::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('bimbinganadmin')->with('success','Bimbingan Berhasil Di Tanggapi');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        //
    }
}
