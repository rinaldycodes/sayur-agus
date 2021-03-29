@extends('templates.backend.master-admin') @section('title', 'Tambah Kategori' )
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center">
        <h1 class="h3 mb-2 text-gray-800">Tambah Kategori</h1>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input
                    type="text"
                    name="name"
                    placeholder="Sayuran"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <a href="{{url()->previous()}}" class="btn btn-secondary"
                    >Batal</a
                >
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
