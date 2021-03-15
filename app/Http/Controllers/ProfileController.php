<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}
