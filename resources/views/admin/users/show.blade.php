@extends('templates.backend.master-admin') @section('title', 'Show' )
@section('content')
<div class="row">
    <div class="col text-center mb-4">
        <h1 class="h3 mb-2 text-gray-800">Show</h1>
        <small>{{$user->name}}</small>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group">
            <img
                src="{{ $user->profile 
                            ? url('/storage').'/'.$user->profile->photo
                            : 'https://bit.ly/3qOrh8Q' }}"
                class="img-prof rounded-circle"
                alt="Harap Klik edit untuk ganti foto"
            />
        </div>
        <div class="form-group">
            <label for="email" class="text-primary">Email</label>
            <p>{{ $user->email }}</p>
        </div>

        <div class="form-group">
            <label for="name" class="text-primary">Nama</label>
            <p>{{ $user->name }}</p>
        </div>

        <div class="form-group">
            <label for="role" class="text-primary">Role</label> <br />
            <p class="badge badge-primary">{{ $user->role }}</p>
        </div>

        <div class="form-group">
            <label class="text-primary">Alamat</label>
            <p class="">
                {{ $user->profile
                                        ? $user->profile->address : '' }}
            </p>
        </div>

        <div class="form-group">
            <label class="text-primary">Bergabung sejak</label>
            <p>{{ $user->created_at->diffForHumans() }}</p>
        </div>
    </div>
</div>
@endsection
