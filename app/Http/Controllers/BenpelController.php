<?php

namespace App\Http\Controllers;

use App\Models\Benpel;
use Illuminate\Http\Request;

class BenpelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Benpel::sortable()->paginate(10)->fragment('benpel');
        return view('Benpel.benpel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Benpel.create-benpel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Benpel::create($request->all());
        return redirect()->route('benpel')->with('success','Bentuk Pelanggaran Berhasil Ditambahkan');
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
        $data = Benpel::findOrFail($id);
        return view('Benpel.edit-benpel', compact('data'));
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
        $data = Benpel::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('benpel')->with('success','Bentuk Pelanggaran Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = Benpel::findOrFail($id);
        $data->delete();
        return back()->with('success','Bentuk Pelanggaran Berhasil Di Hapus');;
    }
}
