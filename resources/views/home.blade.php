@extends('templates.frontend.master') @section('title', 'Home')
@section('content')
<!-- JUMBOTRON -->
<section class="jumbotron mb-3 bg-success">
    <div class="container">
        <div class="row align-items-center">
            <div class="col mb-5 ">
                <!-- Carousel -->
                <div
                    id="carouselExampleIndicators"
                    class="carousel slide"
                    data-bs-ride="carousel"
                >
                    <div class="carousel-indicators">
                        @forelse ($sliders as $key => $value)
                        <button
                            type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $key }}"
                            class="{{ $key==0 ? 'active' : '' }}"
                            aria-current="true"
                            aria-label="{{ $value->name }}"
                        ></button>
                        @empty
                        <p class="text-center">Tidak ada slide</p>
                        @endforelse
                       
                    </div>
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $value )
                        <div class="carousel-item {{ $key==0 ? 'active' : '' }}">
                            <img 
                                src="{{ url('storage', $value->img) }}"
                                class="rounded d-block w-100"
                                alt="Foto {{ config('app.name') }}"
                            />
                        </div>
                        @endforeach
                    </div>
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev"
                    >
                        <span
                            class="carousel-control-prev-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next"
                    >
                        <span
                            class="carousel-control-next-icon"
                            aria-hidden="true"
                        ></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- /Carousel -->
            </div>
            
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="#ffffff"
            fill-opacity="1"
            d="M0,192L48,213.3C96,235,192,277,288,245.3C384,213,480,107,576,106.7C672,107,768,213,864,261.3C960,309,1056,299,1152,256C1248,213,1344,139,1392,101.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
    </svg>
</section>
<!-- /JUMBOTRON -->

<!-- FOR YOU -->
<section id="for-you">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h2 class="fs-3 text-center">
                    FOR YOU<i class="bi bi-heart-fill text-danger"></i>
                </h2>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            @forelse ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="{{ url('/product', $product->slug)}}">
                        <div class="card-body text-center">
                            <img
                                src="{{ $product->galleries->count() ? url('/storage', $product->galleries->first()->img)  : 'https://source.unsplash.com/200x200/?'.$product->name }}"
                                class=""
                                alt="{{ $product->name }} {{
                                    config('app.name')
                                }}"
                            />
                            <p class="title-product text-muted">
                                {{$product->name}}
                            </p>
                            <p class="price-product fw-bold">
                                Rp.{{ number_format($product->price,0,'.','.')}}
                            </p>
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
                <a href="./product" class="btn btn-success btn-lg text-white"
                    >SEE MORE</a
                >
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="#198754"
            fill-opacity="1"
            d="M0,192L24,186.7C48,181,96,171,144,176C192,181,240,203,288,181.3C336,160,384,96,432,106.7C480,117,528,203,576,245.3C624,288,672,288,720,240C768,192,816,96,864,74.7C912,53,960,107,1008,117.3C1056,128,1104,96,1152,122.7C1200,149,1248,235,1296,240C1344,245,1392,171,1416,133.3L1440,96L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"
        ></path>
    </svg>
</section>
<!-- /FOR YOU -->

<!-- About -->
<section id="about" class="bg-success text-white">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h2 class="fs-3 text-center">ABOUT</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <p>
                    <b class="fs-2">{{ config("app.name") }}</b> bergerak di
                    bidang jasa dan toko online, belanja
                    makanan ? belanja pakaian ? ya di {{ config("app.name") }} .
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    "KAMU adalah RAJA. Iya KAMU! KAMU! kamu yang menggunakan
                    jasa dan pelayanan kami, kami anggap sebagai raja, dan
                    tentunya kami harus memberikan pelayanan terbaik untuk RAJA
                    yaitu KAMU"
                </p>
            </div>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="#ffffff"
            fill-opacity="1"
            d="M0,192L48,213.3C96,235,192,277,288,245.3C384,213,480,107,576,106.7C672,107,768,213,864,261.3C960,309,1056,299,1152,256C1248,213,1344,139,1392,101.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
    </svg>
</section>
<!-- /About -->

<!-- BANTUAN -->
<section id="bantuan">
    <div class="container">
        <div class="row mb-3">
            <div class="col"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h6>WhatsApp Customer Service</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-center fs-3 mb-3">
                            <a
                                class="text-center fs-3 text-success"
                                href="https://api.whatsapp.com/send/?phone=6288299862278&text=Halo+Kita%21+Belanja%21+Saya+ingin+belanja%2C+gimana+caranya%3F&app_absent=0"
                            >
                                0882-9986-2278
                            </a>
                        </p>
                        <div class="help mb-5">
                            <details>
                                <summary>
                                    Bagaimana melakukan pemesanan ke {{ config('app.name') }} ?
                                </summary>
                                <p >
                                    <ol class="text-muted">
                                        <li>Pilih produk yang ingin dipesan</li>
                                        <li>Isi form pengiriman </li>
                                        <li>Pilih pengiriman daerah anda / lokasi anda </li>
                                        <li>Pilih pembayaran / payment </li>
                                        <li>Lalu lakukan pembayaran</li>
                                        <li>Dan melakukan konfirmasi pembayaran ke {{ config('app.name') }}</li>
                                    </ol> 
                                </p>
                            </details>
                        </div>
                        <div class="help mb-5">
                            <details>
                                <summary>
                                    Bagaimana melakukan pembayaran bank transfer ke {{ config('app.name') }} ?
                                </summary>
                                <p class="text-muted card-body">
                                    Lakukan pembayaran bank transfer ke salah satu rekening kami:
                                    <ol>
                                        <li>Bank BCA
                                            <p>A/n {{ config('app.name') }} <br>
                                                No Rekening: 123-456-789
                                            </p>
                                        </li>
                                        <li>Bank BRI
                                            <p>A/n {{ config('app.name') }} <br>
                                                No Rekening: 123-456-789
                                            </p>
                                        </li>
                                    </ol>
                                </p>
                            </details>
                        </div>
                        <div class="help mb-5">
                            <details>
                                <summary>
                                    Bagaimana melakukan konfirmasi pembayaran ke {{ config('app.name') }} ?
                                </summary>
                                <p  class="text-muted card-body" >
                                       Selesaikan pembayaran Anda dengan mengirim bukti transfer ke CS (Customer Service) {{ config('app.name') }}.
                                </p>
                            </details>
                        </div>
                        <div class="help mb-5">
                            <details>
                                <summary>
                                    Kapan pengiriman pesanan saya dilakukan {{ config('app.name') }} ?
                                </summary>
                                <p class="text-muted card-body" >
                                    Pengiriman dilakukan setelah anda telah melakukan konfirmasi pembayaran 
                                    dan {{ config('app.name') }} akan memverifikasi pembayaran
                                </p>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="#198754"
            fill-opacity="1"
            d="M0,320L17.1,298.7C34.3,277,69,235,103,192C137.1,149,171,107,206,106.7C240,107,274,149,309,160C342.9,171,377,149,411,144C445.7,139,480,149,514,133.3C548.6,117,583,75,617,74.7C651.4,75,686,117,720,112C754.3,107,789,53,823,80C857.1,107,891,213,926,229.3C960,245,994,171,1029,122.7C1062.9,75,1097,53,1131,42.7C1165.7,32,1200,32,1234,42.7C1268.6,53,1303,75,1337,74.7C1371.4,75,1406,53,1423,42.7L1440,32L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z"
        ></path>
    </svg>
</section>
<!-- /BANTUAN -->
@endsection
