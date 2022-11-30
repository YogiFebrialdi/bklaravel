<?php

namespace App\Http\Controllers;

use App\Models\Bimbingansiswa;
use Illuminate\Http\Request;

class BimbingansiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        $siswa = Bimbingansiswa::where('level','siswa')->get();
        if(!empty($cari)){
            $data = Bimbingansiswa::sortable()
            ->where('form.tglbim', 'like', '%'. $cari. '%')
            ->orWhere('form.nama', 'like', '%'. $cari. '%')
            ->orWhere('form.kelas', 'like', '%'. $cari. '%')
            ->paginate(14)->fragment('bimbingansiswa');
        }else{
            $data =  Bimbingansiswa::sortable()->paginate(10)->fragment('bimbingansiswa');
        }

        return view('Formsiswa.bimbingansiswa')->with([
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
        return view('Formsiswa.create-bimbingansiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    Bimbingansiswa::create($request->all());
    return redirect()->route('bimbingansiswa')->with('success','bimbingan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $data = Form::findOrFail($id);
    //     return view('Form.tanggapibimbingan', compact('data'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bimbingansiswa::findOrFail($id);
        return view('Formsiswa.edit-bimbingansiswa', compact('data'));
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
        $data = Bimbingansiswa::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('bimbingansiswa')->with('success','Data Berhasil Di Kirim');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $data = Sanksi::findOrFail($id);
    //     $data->delete();
    //     return back()->with('success','Data Berhasil Di Hapus');;
    // }
}
