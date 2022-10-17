<?php

namespace App\Http\Controllers;

use App\Models\Sanksi;
use Illuminate\Http\Request;

class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $cari = $request->query('cari');
        // if(!empty($cari)){
        //     $data = Sanksi::sortable()
        //     ->where('sanksi.sanksi', 'like', '%'. $cari. '%')
        //     ->paginate(5)->fragment('sanksi');
        // }else{
        //     $data =  Sanksi::sortable()->paginate(5)->fragment('sanksi');
        // }

        $data = Sanksi::paginate(5)->fragment('sanksi');
        return view('Sanksi.sanksi', compact('data'));
        // return view('Sanksi.sanksi')->with([
        //     'data' => $data,
        //     'cari' => $cari,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sanksi.create-sanksi');
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
    //    sanksi::create([
    //     'sanksi' => $request->sanksi,
    //    ]);
    Sanksi::create($request->all());
    return redirect()->route('sanksi')->with('success','sanksi Berhasil Ditambahkan');

       //return redirect('sanksi');
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
        $data = Sanksi::findOrFail($id);
        return view('Sanksi.edit-sanksi', compact('data'));
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
        $data = Sanksi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('sanksi')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Sanksi::findOrFail($id);
        $data->delete();
        return back()->with('success','Data Berhasil Di Hapus');;
    }
}
