@extends('templates.backend.master-admin')

@section('title', 'Profile'  )

@section('content')
    <!-- Page Heading -->
    <div id="profile" class="row  align-items-center">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Profile</h1>
        </div>
    </div>
    <hr>
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <a class="text-white" href="{{ route('profile.edit', $user->id ) }}">Edit</a>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <img src="{{ $user->profile 
                            ? url('/storage', $user->profile->photo)  
                            : 'https://bit.ly/3qOrh8Q' }}" 
                            class="img-prof rounded-circle"  alt="Photo">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                   
                            <div class="email">
                                <label class="text-primary">Nama</label>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                            <div class="email">
                                <label class="text-primary">Email</label>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="role">
                                <p class="badge badge-primary">{{ $user->role }}</p>
                            </div>
                            <div class="role">
                                <label class="text-primary">Alamat</label>
                                <p class="">{{ $user->profile
                                        ? $user->profile->address : '' }}</p>
                            </div>
                            <div class="join">
                                <label class="text-primary">Bergabung sejak</label>
                                <p>{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection