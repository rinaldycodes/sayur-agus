@extends('templates.backend.master-admin') @section('title', 'Tambah Slider' )
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center">
        <h1 class="h3 mb-2 text-gray-800">Tambah Slider</h1>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            action="{{ route('sliders.store') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-group">
                <label for="name">Nama Slider</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input
                    type="file"
                    name="img"
                    class="form-control @error('img') is-invalid @enderror"
                />
                @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <a href="{{ route('sliders.index') }}" class="btn btn-secondary"
                    >Batal</a
                >
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
