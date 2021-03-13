@extends('templates.frontend.master')

@section('title', 'Shipping' )

@section('content')
<!-- PRODUCT -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#198754" fill-opacity="1" d="M0,64L34.3,64C68.6,64,137,64,206,101.3C274.3,139,343,213,411,218.7C480,224,549,160,617,128C685.7,96,754,96,823,122.7C891.4,149,960,203,1029,197.3C1097.1,192,1166,128,1234,112C1302.9,96,1371,128,1406,144L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
<section id="product" class="bg-white">
      <div class="container">
        <div class="row mb-3">
          <div class="col">
            <h1 class="fs-1 text-center mb-5">PRODUCT</h1>
          </div>
        </div>
        <div class="row justify-content-center">
        @forelse ($products as $product)
          <div class="col-md-4 col-lg-3 mb-3">
            <div class="card">
              <a href="{{ url('/product', $product->slug)}}">
                <div class="card-body">
                  <img src="https://source.unsplash.com/400x400/?bayam,food" class="" alt="online shop" />
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
        <div class="row text-center">
          <div class="col">
            <a href="./product" class="btn btn-success btn-lg text-white">SEE MORE</a>
          </div>
        </div>
      </div>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#198754" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
    <!-- /PRODUCT -->
@endsection