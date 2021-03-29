@extends('templates.backend.master-admin') @section('title')
{{$product->name}}
@endsection @section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center">
        <h1 class="h3 mb-2 text-gray-800">Detail</h1>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="name">
            <label for="">Name</label>
            <p>
                <b>{{$product->name}}</b>
            </p>
        </div>
        <div class="price">
            <label for="">Price</label>
            <p>
                <b>Rp.{{ number_format($product->price,0,'.','.')}}</b>
            </p>
        </div>
        <div class="stock">
            <label for="">Stock</label>
            <p>
                <b>{{$product->stock}}</b>
            </p>
        </div>
        <div class="category">
            <label for="">Category</label>
            <p>
                <b>{{$product->category->name}}</b>
            </p>
        </div>
        <div class="viewers">
            <label for="">Viewers</label>
            <p>
                <b>{{$product->viewers != null ? $product->viewers : '0' }}</b>
            </p>
        </div>
        <div class="description">
            <label for="">Description</label>
            <p>
                <b>{!!$product->description!!}</b>
            </p>
        </div>
        <div class="created_at">
            <label for="">Created</label>
            <p>
                <b
                    >{{$product->created_at}} <br />
                    <small>{{$product->created_at->diffForHumans()}}</small></b
                >
            </p>
        </div>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
