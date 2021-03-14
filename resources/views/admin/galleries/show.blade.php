@extends('templates.backend.master-admin')

@section('title', 'Tambah Foto'  )

@section('content')
    <!-- Page Heading -->
    <div class="row mb-5">
        <div class="col text-center">
            <h1 class="h3 mb-2 text-gray-800">Tambah Foto {{$product->name}}</h1>
        </div>
    </div>
    <div class="row">
        <!-- FORM -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{route('galleries.store', $product->id)}}"  enctype="multipart/form-data" method="post">
                        @csrf
                        
                        <input type="text" value="{{$product->id}}" name="product_id" hidden>
                        <div class="form-group">
                            <label for="name">Pilih Produk</label>
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
                            <a href="{{ route('products.index' )}}" class="btn btn-secondary">Batal</a>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- GALLERI -->
        <div class="col-md-6">
            <div class="row text-center mb-3">
                <div class="col">
                <h6>Galeri </h6>
                </div>
            </div>
            <div class="row text-center">
                @forelse ($galleries as $gallery)
                <div class="col mb-3">
                    <div class="img-container mb-2">
                        <img src="{{ url('/storage', $gallery->img) }}" alt="{{ config('app.name')}}" class="rounded img-thumbnail" >
                    </div>
                    <div class="buttons">
                        <a href="{{ url('/admin/galleries/delete', $gallery->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
                @empty
                <div class="col">
                    <p class="text-danger">TIDAK ADA FOTO !</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
        
    <!-- /PRODUCT -->
@endsection