<?php

namespace App\Http\Controllers;

use App\Models\Akunguru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cari = $request->query('cari');
        $guru = Akunguru::where('level', 'guru')->get();
        if(!empty($cari)){
            $data = Akunguru::sortable()
            ->where('users.name', 'like', '%'. $cari. '%')
            ->paginate(5)->fragment('akunguru');
        }else{
            $data =  Akunguru::sortable()->paginate(10)->fragment('akunguru');
        }

            //    $data = Akunguru::sortable()->paginate(5)->fragment('akunguru');
    //     return view('Akunguru.akunguru', compact('data'));
        return view('Akunguru.akunguru')->with([
            'data' => $data,
            'cari' => $cari,
            'guru' => $guru,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Akunguru.create-akunguru');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Akunguru::create([
            'name' => $request->name,
            'level' => "guru",
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('akunguru')->with('success','Data Berhasil Ditambahkan');
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
        $data = Akunguru::findOrFail($id);
        return view('Akunguru.edit-akunguru', compact('data'));
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
        $data = Akunguru::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => Hash::make ($request->password),
        ]);
        return redirect()->route('akunguru')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Akunguru::findOrFail($id);
        $data->delete();
        return back()->with('success','Data Berhasil Di Hapus');;
    }
}
