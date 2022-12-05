<?php

namespace App\Http\Controllers;

use App\Models\Daftarsiswa;
use Illuminate\Http\Request;

class DaftarsiswaController extends Controller
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
            $data = Daftarsiswa::join("users", "users.id", "=", "datasiswa.user_id")
            ->where("nis", "LIKE", '%'. $cari. '%')
            ->orWhere("name", "LIKE", '%'. $cari. '%')
            ->paginate(5)->fragment('daftarsiswa');
        }else{
            $data =  Daftarsiswa::with('kelas')->sortable()->paginate(5)->fragment('daftarsiswa');
        }

        return view('Daftarsiswa.daftarsiswa')->with([
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
        //
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
        //
    }
}
