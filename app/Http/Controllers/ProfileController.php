<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $data = array('title' => 'Profil');
        return view('Profile.profile', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('Profile.setting', $data);
    }
}
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Storage;
// use App\Models\User;

// class ProfileController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index(Request $request)
//     {
//         $user = User::findOrFail(Auth::id());
//         return view('Profile.profile', compact('user'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         return view('Profile.profile');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         request()->validate([
//             'name'       => 'required|string|min:2|max:100',
//             'email'      => 'required|email|unique:users,email, ' . $id . ',id',
//             'old_password' => 'nullable|string',
//             'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
//         ]);

//         $user = User::find($id);

//         $user->name = $request->name;
//         $user->email = $request->email;

//         if ($request->filled('old_password')) {
//             if (Hash::check($request->old_password, $user->password)) {
//                 $user->update([
//                     'password' => Hash::make($request->password)
//                 ]);
//             } else {
//                 return back()
//                     ->withErrors(['old_password' => __('Please enter the correct password')])
//                     ->withInput();
//             }
//         }

//         if (request()->hasFile('photo')) {
//             if($user->photo && file_exists(storage_path('app/public/photos/' . $user->photo))){
//                 Storage::delete('app/public/photos/'.$user->photo);
//             }

//             $file = $request->file('photo');
//             $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
//             $request->photo->move(storage_path('app/public/photos'), $fileName);
//             $user->photo = $fileName;
//         }


//         $user->save();

//         return back()->with('status', 'Profile updated!');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
