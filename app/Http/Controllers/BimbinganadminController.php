<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
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
        if(!empty($cari)){
            $data = Bimbingan::join("datasiswa", "datasiswa.user_id", "=", "bimbingan.siswa_id")->join("users", "users.id", "=", "datasiswa.user_id")
            ->where("bimbingan.tanggal_bimbingan", 'like', '%'. $cari. '%')
            ->orWhere("users.name", "LIKE", "%" . $cari . "%")
            ->orWhere("bimbingan.status", 'like', '%'. $cari. '%')
            ->paginate(14);
        }else{
            $data =  Bimbingan::orderBy("status", "DESC")->paginate(10);
        }

        return view('Formadmin.bimbinganadmin')->with([
            'data' => $data,
            'cari' => $cari
        ]);
    }

    public function edit($id)
    {
        $data = Bimbingan::where("id", $id)->first();

        return view('Formadmin.tanggapibimbingan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        Bimbingan::where("id", $id)->update([
            "tanggapan" => $request->tanggapan,
            "status" => 1
        ]);

        return redirect()->route('bimbinganadmin')->with('success','Bimbingan Berhasil Di Tanggapi');
    }
}
