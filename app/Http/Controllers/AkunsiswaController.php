<?php

namespace App\Http\Controllers;

use App\Models\Akunsiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunsiswaController extends Controller
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
            $data = Akunsiswa::sortable()
            ->where('users.name', 'like', '%'. $cari. '%')
            ->paginate(5)->fragment('akunsiswa');
        }else{
            $data =  Akunsiswa::sortable()->paginate(5)->fragment('akunsiswa');
        }
        return view('Akunsiswa.akunsiswa')->with([
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
        return view('Akunsiswa.create-akunsiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     Akunsiswa::create($request->all());
    // return redirect()->route('akunsiswa')->with('success','Akun Berhasil Ditambahkan');
            Akunsiswa::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request->password),
           ]);
           return redirect()->route('akunsiswa')->with('success','Akun Berhasil Ditambahkan');
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
        $data = Akunsiswa::findOrFail($id);
        return view('Akunsiswa.edit-akunsiswa', compact('data'));
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
    {
        $data = Akunsiswa::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('akunsiswa')->with('success','Akun Berhasil Di Update');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Akunsiswa::findOrFail($id);
        $data->delete();
        return back()->with('success','Akun Berhasil Di Hapus');;
    }
}
