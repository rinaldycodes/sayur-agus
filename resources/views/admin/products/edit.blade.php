@extends('templates.backend.master-admin')

@section('title', 'Edit Produk'  )

@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col text-center">
            <h1 class="h3 mb-2 text-gray-800">Edit Produk</h1>
            <small>{{$product->name}}</small>
        </div>
    </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('products.update', $product->slug)}}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input 
                            type="text" 
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{$product->name}}"
                        />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Produk</label>
                        <input 
                            type="text" 
                            name="price"
                            maxlength="10"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ number_format($product->price,0,'.','.')}}"
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
                            value="{{$product->stock}}" 
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
                            <option value="{{$product->category_id}}">{{$product->category_id}}</option>
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description" cols="15" rows="5" class="form-control @error('stock') is-invalid @enderror">{{$product->description}}</textarea>
                      
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a href="{{route('products.index')}}" class="btn btn-secondary">Batal</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- /PRODUCT -->
@endsection