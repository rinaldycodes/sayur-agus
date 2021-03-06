@extends('templates.frontend.master') @section('title', $product->name)
@section('content')

<!-- DETAIL PRODUCT -->
<section class="detail-product mb-5">
    <div id="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="d-none d-md-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                {{$product->name}}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 card">
                <!-- Carousel -->
                <div
                    id="carouselProduct"
                    class="carousel slide"
                    data-bs-ride="carousel"
                >
                    <div class="carousel-indicators">
                        <button
                            type="button"
                            data-bs-target="#carouselProduct"
                            data-bs-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="Slide 1"
                        ></button>
                        <button
                            type="button"
                            data-bs-target="#carouselProduct"
                            data-bs-slide-to="1"
                            aria-label="Slide 2"
                        ></button>
                        <button
                            type="button"
                            data-bs-target="#carouselProduct"
                            data-bs-slide-to="2"
                            aria-label="Slide 3"
                        ></button>
                    </div>
                    <div class="carousel-inner">
                        @foreach($product->galleries as $key => $value)
                        <div
                            class="carousel-item p-5 {{
                                $key == 0 ? 'active' : ''
                            }} "
                        >
                            <img src="{{ $product->galleries->count() ? url('/storage', $value->img)  : 'https://source.unsplash.com/100x100/?sayur,vegetables'




                            }}"" class="d-block w-100" alt="Online Shop" />
                        </div>
                        @endforeach
                    </div>
                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselProduct"
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
                        data-bs-target="#carouselProduct"
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
            <div class="col-md-6">
                <div class="card-header bg-success"></div>
                <!-- FORM HIDDEN -->
                <form
                    action="{{ url('/add-item', $product->slug) }}"
                    method="post"
                    class="card-body shadow"
                >
                    @csrf
                    <input
                        type="text"
                        name="slug"
                        value="{{ $product->slug }}"
                        hidden
                    />
                    <input
                        type="text"
                        name="price"
                        value="{{ $product->price }}"
                        hidden
                    />
                    <h1 class="fs-3">{{ $product->name }}</h1>

                    <div class="mb-3">
                        <label for="price" class="text-muted">Harga</label>
                        <p class="fs-4">
                            Rp.{{ number_format($product->price,0,'.','.') }}
                        </p>
                    </div>

                    <div class="mb-3 qty" id="qtyContainer">
                        <button
                            type="button"
                            id="min"
                            class="btn btn-sm btn-light text-success fw-bold fs-3"
                        >
                            -
                        </button>
                        <input
                            name="qty"
                            type="text"
                            id="qty"
                            readonly
                            value="1"
                            max="{{ $product->stock }}"
                        />
                        <button
                            type="button"
                            id="plus"
                            class="btn btn-sm btn-light text-success fw-bold fs-3"
                        >
                            +
                        </button>
                    </div>
                    <p id="messageQty" class="text-danger"></p>

                    <div class="mb-3">
                        <label for="desc" class="text-muted">Description</label>
                        <p>{!! $product->description !!}</p>
                    </div>

                    <!-- BUTTONS -->
                    <div class="buttons my-5">
                        <a
                            href="{{ url('/') }}"
                            class="btn btn-md btn-outline-success"
                            ><i class="bi bi-arrow-left-circle-fill"></i>
                            Back</a
                        >
                        <button
                            id="add-to-cart"
                            type="submit"
                            class="btn btn-md btn-success"
                        >
                            <i class="bi bi-basket"></i> Add to Cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Related Product -->
<section id="from-category">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h2 class="fs-3">Related Product</h2>
            </div>
        </div>
        <div class="row">
            @forelse ($related as $product)
            <div class="col-md-4 col-lg-3 mb-3">
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
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="#198754"
            fill-opacity="1"
            d="M0,256L18.5,261.3C36.9,267,74,277,111,240C147.7,203,185,117,222,101.3C258.5,85,295,139,332,138.7C369.2,139,406,85,443,101.3C480,117,517,203,554,240C590.8,277,628,267,665,266.7C701.5,267,738,277,775,288C812.3,299,849,309,886,298.7C923.1,288,960,256,997,245.3C1033.8,235,1071,245,1108,224C1144.6,203,1182,149,1218,112C1255.4,75,1292,53,1329,48C1366.2,43,1403,53,1422,58.7L1440,64L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"
        ></path>
    </svg>
</section>
<!-- /from category -->
@endsection
