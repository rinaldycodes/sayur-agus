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
            <label for="email">Email User</label>
            <b>{{ $user->email }}</b>
        </div>

        <div class="form-group">
            <label for="name">Nama User</label>
            <b>{{ $user->name }}</b>
        </div>

        <div class="form-group">
            <label for="role">Role User</label>
            <b>{{ $user->role }}</b>
        </div>
    </div>
</div>
@endsection
