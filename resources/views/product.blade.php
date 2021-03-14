@extends('templates.frontend.master')

@section('title', 'Shipping' )

@section('content')
<!-- PRODUCT -->
<section id="product" class="bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col">
            <h2 class="fs-3 text-center ">SEMUA PRODUK</h2>
          </div>
        </div>
        <div class="row justify-content-center mb-5">
        @forelse ($products as $product)
          <div class="col-md-4 col-lg-3 mb-3">
            <div class="card">
              <a href="{{ url('/product', $product->slug)}}">
                <div class="card-body text-center">
                  <img src="{{ $product->galleries->count() ? url('/storage', $product->galleries->first()->img)  : 'https://source.unsplash.com/100x100/?sayur,vegetables' }}" 
                  class="" alt="{{ $product->name }} {{ config('app.name') }}" />
                  <p class="title-product text-muted">{{$product->name}}</p>
                  <p class="price-product fw-bold">Rp.{{ number_format($product->price,0,'.','.')}}</p>
                </div>
              </a>
            </div>
          </div>
        @empty
          <p>Tidak ada Produk</p>
        @endforelse
        </div>
      </div>

    </section>
    <!-- /PRODUCT -->
@endsection