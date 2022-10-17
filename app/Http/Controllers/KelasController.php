<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
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
            $data = Kelas::sortable()
            ->where('kelas.kelas', 'like', '%'. $cari. '%')
            ->paginate(14)->fragment('kelas');
        }else{
            $data =  Kelas::sortable()->paginate(14)->fragment('kelas');
        }

    //    $data = Kelas::sortable()->paginate(5)->fragment('kelas');
    //     return view('Kelas.kelas', compact('data'));
        return view('Kelas.kelas')->with([
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
        return view('Kelas.create-kelas');
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
    //    kelas::create([
    //     'kelas' => $request->kelas,
    //    ]);
    Kelas::create($request->all());
    return redirect()->route('kelas')->with('success','Kelas Berhasil Ditambahkan');

       //return redirect('kelas');
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
        $data = Kelas::findOrFail($id);
        return view('Kelas.edit-kelas', compact('data'));
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
        $data = Kelas::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kelas')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return back()->with('success','Data Berhasil Di Hapus');;
    }
}
