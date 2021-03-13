@extends('templates.backend.master-admin')

@section('title', 'Edit Kategori'  )

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col text-center">
            <h1 class="h3 mb-2 text-gray-800">Edit Kategori</h1>
            <small>{{$category->name}}</small>
        </div>
    </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('categories.update', $category->slug)}}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input 
                            type="text" 
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{$category->name}}"
                        />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a href="{{route('categories.index')}}" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- /category -->
@endsection