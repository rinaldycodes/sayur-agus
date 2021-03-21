@extends('templates.backend.master-admin') @section('title', 'Edit User' )
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center mb-4">
        <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
        <small>{{$user->name}}</small>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('users.update', $user->id)}}" method="post">
            @method('PUT') @csrf

            <div class="form-group">
                <label for="name">Nama User</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{$user->name}}"
                />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role User</label>
                <select name="role" id="" class="form-control">
                    <option value="">-= PILIH =-</option>
                    <option value="USER">USER</option>
                    <option value="ADMIN">ADMIN</option>
                </select>
                @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_telp">No. TELP / WA</label>
                <input
                    type="text"
                    name="no_telp"
                    value="{{$user->no_telp}}"
                    class="form-control @error('no_telp') is-invalid @enderror"
                />
                @error('no_telp')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <a href="{{ route('users.index') }}" class="btn btn-secondary"
                    >Batal</a
                >
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
