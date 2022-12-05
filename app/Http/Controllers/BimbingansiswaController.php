<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BimbingansiswaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        if(!empty($cari)){
            $data = Bimbingan
            ::where("tanggal_bimbingan", 'like', '%'. $cari. '%')
            ->orWhere("bimbingan", 'like', '%'. $cari. '%')
            ->paginate(14);
        }else{
            $data = Bimbingan::where("siswa_id", Auth::user()->id)->orderBy("id", "DESC")->paginate("10");
        }

        return view('Formsiswa.bimbingansiswa')->with([
            'data' => $data,
            'cari' => $cari
        ]);
    }

    public function store(Request $request)
    {
        Bimbingan::create([
            "siswa_id" => Auth::user()->id,
            "bimbingan" => $request->bimbingan,
            "status" => 0,
            "tanggal_bimbingan" => date("Ymd")
        ]);
        return redirect()->route('bimbingansiswa')->with('success','bimbingan Berhasil Ditambahkan');
    }
}
