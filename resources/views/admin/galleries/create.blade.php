@extends('templates.backend.master-admin')

@section('title', 'Tambah Foto'  )

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col text-center">
            <h1 class="h3 mb-2 text-gray-800">Tambah Foto</h1>
        </div>
    </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('galleries.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Pilih Produk</label>
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
                        <label for="price">Harga Foto</label>
                        <input 
                            type="text" 
                            name="price"
                            maxlength="10"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}"
                        />
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input 
                            type="text" 
                            name="stock" 
                            value="{{ old('stock') }}" 
                            class="form-control @error('stock') is-invalid @enderror"
                        />
                        @error('stock')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select 
                            name="category_id" 
                            class="form-control @error('stock') is-invalid @enderror"
                        >
                            <option value="">-=Pilih=-</option>
                            <option value="1">Sayuran</option>
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" cols="15" rows="5" class="form-control @error('stock') is-invalid @enderror">{{ old('stock') }}</textarea>
                      
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a href="#" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- /PRODUCT -->
@endsection