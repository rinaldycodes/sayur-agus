@extends('templates.frontend.master') @section('title', 'Shoping Cart' )
@section('content')
<!--  cart -->
<section id="cart">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h1 class="fs-2">SHOPPING CART</h1>
                <p class="text-muted">
                    This is your shopping cart you have
                    <b>{{ Cart::count() }} items</b>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mb-5">
                <table class="table table-hover">
                    <tbody>
                        @forelse (Cart::content() as $row)
                        <tr>
                            <td
                                class="d-md-block d-none align-middle text-center"
                            >
                                <img
                                    src="{{ $row->options->has('img') ? url('/storage', $row->options->img) : '' }}"
                                    class="rounded"
                                    alt="Foto {{ $row->name }} {{
                                        config('app.name')
                                    }}"
                                />
                            </td>
                            <td class="align-middle" width="70%">
                                <b>{{ $row->name }}</b>
                                <p class="text-muted">
                                    <small>Price: Rp.{{ $row->price }}</small>
                                    <br />
                                    <small>Qty: {{ $row->qty }}</small> <br />
                                    <b
                                        >Subtotal: Rp.{{ number_format($row->total, 0,'.','.') }}</b
                                    >
                                </p>
                            </td>
                            <form
                                action="{{ url('/update-item', $row->rowId) }}"
                            >
                                <td class="align-middle text-end">
                                    <div
                                        class="mb-3 qty d-flex"
                                        id="qtyContainer"
                                    >
                                        <button
                                            type="button"
                                            id="min"
                                            class="btn btn-sm text-success fw-bold fs-3"
                                        >
                                            -
                                        </button>
                                        <input
                                            name="{{ $row->rowId }}"
                                            type="text"
                                            id="qty"
                                            readonly
                                            value="{{ $row->qty }}"
                                            max="{{ $row->options->stock }}"
                                        />
                                        <button
                                            type="button"
                                            id="plus"
                                            class="btn btn-sm text-success fw-bold fs-3"
                                        >
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <a
                                        href="{{ url('/remove-item', $row->rowId) }}"
                                        class="btn btn-sm"
                                        title="hapus"
                                        ><i
                                            class="bi bi-x-circle-fill text-danger fs-5"
                                        ></i
                                    ></a>
                                    <button
                                        type="submit"
                                        class="btn btn-sm"
                                        title="update"
                                    >
                                        <i
                                            class="bi bi-arrow-repeat text-success fs-5"
                                        ></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @empty
                        <tr>
                            <td
                                colspan="4"
                                class="text-center align-middle"
                                height="200"
                            >
                                <h3>Keranjang Kosong</h3>
                                Back to <a href="{{ url('/') }}">Home</a>
                            </td>
                        </tr>
                        @endforelse

                        <tr>
                            <td colspan="2">
                                <b class="fs-4"
                                    >Total: Rp.{{ Cart::total() }}</b
                                >
                            </td>
                            @if ( Cart::count() >= 1)
                            <td>
                                <a
                                    href="{{ url('/destroy-cart') }}"
                                    class="btn btn-sm btn-danger"
                                    ><i class="bi bi-trash"></i>
                                </a>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                <!-- DESKTOP -->
                <div class="row d-md-flex">
                    <div class="col">
                        <a
                            href="{{ url('/product') }}"
                            class="btn btn-sm btn-outline-success"
                            >ADD MORE</a
                        >
                    </div>
                    <div class="col text-end">
                        <a
                            href="{{ url('/shipping') }}"
                            class="text-end btn btn-sm btn-success"
                        >
                            <i class="bi bi-truck"></i> SHIPPING</a
                        >
                    </div>
                </div>
                <!-- DESKTOP -->
            </div>
        </div>
    </div>
</section>
@endsection
