<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('profile.index', compact(
            'user'
        ));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required',
        ], );


        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();
        
        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->photo = $request->file('photo')->store('images', 'public');
        $profile->address = $request->address;
        $profile->no_telp = $request->no_telp;
        $profile->save();

        return back();
    }

    public function destroy($id)
    {
        //
    }

    public function changePassword() {
        return view('profile.change-password');
    }

    public function changePasswordProcess(Request $request , $id) {

        $msg = [
            'password.required' => "Password tidak boleh kosong",
            'new_password.required' => "New Password tidak boleh kosong",
        ];
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:3',
        ], $msg);


        if(Hash::check($request->password, Auth::user()->password)) {
            $hashed = Hash::make($request->new_password);
            $user = User::find(Auth::user()->id);
            $user->password = $hashed;
            $user->update();
            return back()->with('message', 'Successfuly changed!');
        }
        return back()->with('message', 'Current Password does not match');
        
    }
}
