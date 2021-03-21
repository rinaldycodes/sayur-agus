@extends('templates.frontend.master')

@section('title', 'Shipping' )

@section('content')

<!--  cart -->
<section id="shipping" class="mb-5">
    <div class="container">
    <div class="row text-center">
        <div class="col">
        <h1 class="fs-2">SHIPPING <i class="bi bi-truck+"></i></h1>
        <p>Shipping Form and Payment Detail</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-body ">
                <form action="{{ url('/shipping/store') }}" method="post">
                @csrf
                    <div class="mb-3">
                        <label for="name">Nama Penerima <small class="text-danger">*</small></label>
                        <input type="text" name="name" id="name" 
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="no_telp">No. Whatsapp / No. Aktif  <small class="text-danger">*</small></label>
                        <input type="text" name="no_telp" id="no_telp" 
                            class="form-control  @error('no_telp') is-invalid @enderror"
                            value="{{ old('no_telp') }}">
                        @error('no_telp')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror  
                    </div>
                    <div class="mb-5">
                        <label for="address">Alamat <small class="text-danger">*</small></label>
                        <textarea name="address" id="address" cols="15" rows="5" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                        @error('address')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror  
                    </div>
                    <div class="mb-5">
                        <label for="message" class="text-muted">Catatan untuk penjual</label>
                        <textarea name="message" id="message" cols="15" rows="5" class="form-control"></textarea>
                    </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="card mb-5">
                <div class="card-header bg-success text-white">
                    <h2 class="fs-6">YOUR ORDER HERE</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Product</th>
                            <th class="text-end">Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                        
                        @forelse (Cart::content() as $row)
                        <tr>
                            <td class="align-middle">
                                <p>
                                    <b class="title-product">
                                        {{ $row->name}}
                                    </b>
                                </p>
                                    <span class="text-muted">Price: Rp. {{ number_format($row->price, 0,'.','.') }}</span>
                            </td>
                            <td class="align-middle text-end">
                                <p>{{ $row->qty }}</p>
                            </td>
                            <td class="align-middle text-end">
                                <p class="fw-bold">Rp.{{ number_format($row->subtotal, 0,'.','.') }}</p>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3"><h6>No Data</h6></td>
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="2">
                                <p class="fs-5" >Subtotal</p>
                                <input type="number" value="{{ str_replace('.','', Cart::total()) }}" id="subtotal" hidden>
                            </td>
                            
                            <td class="align-middle text-end">
                                <p class="fs-5"><strong>Rp.{{ Cart::total() }}</strong></p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="1">
                                <p class="fs-5" >Pengiriman Ke</p>
                            </td>
                            
                            <td class="align-middle text-end">
                                <select name="pengiriman" id="location" onchange="myShipping(this)">
                                    <option value="" data-price="0">Pilih</option>
                                    <option value="Bekasi" data-price="10000">Bekasi</option>
                                    <option value="Tambun" data-price="5000">Tambun</option>
                                </select>
                            </td>
                            <td class="align-middle text-end">
                                <p id="ongkirText"></p>
                                @error('payment_id')
                                <div class="text-center text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <input type="text" id="ongkirInput" name="ongkir" hidden >
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <p class="fs-5" >Total</p>
                            </td>
                            
                            <td class="align-middle text-end">
                                <p class="fs-5"><strong id="totalText"></strong></p>
                                <input type="text" value="" id="totalInput" name="total" hidden >
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle" >
                                <p class="fs-5" >Payment</p>
                            </td>
                            <td class="align-middle text-end " colspan="2"> 
                                <select name="payment_id" id="" class="form-control @error('payment') is-invalid @enderror">
                                <option value="">-=PILIH=-</option>
                                @foreach ( $payments as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->payment }}</option>
                                @endforeach
                                </select>
                                @error('payment_id')
                                    <div class="alert alert-danger text-center">
                                        {{$message}}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                    </table>
                </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="#" class="btn btn-secondary btn-md ">CANCEL</a>
                    </div>
                    <div class="col text-end">
                        <button type="submit" class="btn btn-success btn-md ">CHECKOUT</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</section>


@endsection