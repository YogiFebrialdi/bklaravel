<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Datasiswa;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
            $data = Datasiswa::join("users", "users.id", "=", "datasiswa.user_id")
                ->where("nis", "LIKE", "%" . $cari . "%")
                ->orWhere("name", "LIKE", "%" . $cari . "%")
                ->paginate(5);
        }else{
            $data =  Datasiswa::with('kelas')->sortable()->paginate(5)->fragment('datasiswa');
        }

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
        $user = new User;

        $user->name = $request->nama;
        $user->level = "siswa";
        $user->email = $request->email;
        $user->password = bcrypt("siswa" . $request->nis);
        $user->save();

        Datasiswa::create([
            "nis" => $request->nis,
            "user_id" => $user->id,
            "kelas_id" => $request->kelas_id,
            "jk" => $request->jk,
            "ttl" => $request->ttl,
            "alamat" => $request->alamat,
            "walimurid" => $request->walimurid,
            "telepon" => $request->telepon
        ]);

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
        $kelas = Kelas::all();
        $data = Datasiswa::findOrFail($id);
        return view('Datasiswa.edit-datasiswa')->with([
            'data' => $data,
            'kelas' => $kelas,
        ]);
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
        User::where("id", $id)->update([
            "name" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt("siswa" . $request->nis)
        ]);

        Datasiswa::where("id", $id)->update([
            "nis" => $request->nis,
            "kelas_id" => $request->kelas_id,
            "jk" => $request->jk,
            "ttl" => $request->ttl,
            "alamat" => $request->alamat,
            "walimurid" => $request->walimurid,
            "telepon" => $request->telepon
        ]);

        return redirect()->route('datasiswa')->with('success','Data Berhasil Di Update');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($user_id)
    {
        $data = Datasiswa::where("user_id", $user_id)->first();

        User::where("id", $user_id)->delete();

        $data->delete();
        return back()->with('success','Data Berhasil Di Hapus');;
    }
}
