@extends('templates.backend.master-admin')

@section('title', 'Semua Produk'  )

@section('content')
    <!-- PRODUCT -->
    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Produk</h1>
        </div>
        <div class="col text-right">
            <a href="{{route('products.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        
    </div>
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Semua Produk</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="myTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Galeri</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Galeri</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center">
                            @forelse ($products as $product)
                           
                            <tr class="align-middle">
                                <td>
                                    <p><b>{{$product->name}}</b></p>
                                    
                                </td>
                                <td><small>Rp.{{ number_format($product->price,2,',','.')}}</small></td>
                                <td><a href="#"><i class="fas fa-image fs-1"></i> Galeri</a></td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm mb-1">
                                            <a href="{{route('products.edit', $product->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-sm mb-1">
                                        <form action="{{route('products.destroy', $product->id)}}" method="post" data-toggle="tooltip" data-placement="top" title="Delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <p>Tidak ada produk <a href="{{ route('products.create')}}">Buat produk</a></p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- /PRODUCT -->
@endsection