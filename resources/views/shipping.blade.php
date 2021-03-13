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
                <form action="">
                    <div class="mb-3">
                        <label for="name">Nama Penerima <small class="text-danger">*</small></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp">No. Whatsapp / No. Aktif  <small class="text-danger">*</small></label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label for="address">Nama Penerima <small class="text-danger">*</small></label>
                        <textarea name="address" id="address" cols="15" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="add_note" class="text-muted">Catatan untuk penjual</label>
                        <textarea name="add_note" id="add_note" cols="15" rows="5" class="form-control"></textarea>
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
                                <p class="fs-5" >Total</p>
                            </td>
                            
                            <td class="align-middle text-end">
                                <p class="fs-5"><strong>Rp.{{ Cart::total() }}</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle" >
                                <p class="fs-5" >Payment</p>
                            </td>
                            <td class="align-middle text-end " colspan="2"> 
                                <select name="payment" id="" class="form-control">
                                <option value="">-=pILIH=-</option>
                                    <option value="cod">COD - BAYAR DI TEMPAT</option>
                                    <option value="bca">Agus Irawan - BCA - 123789123</option>
                                    <option value="bnibca">Agus Irawan - BNI - 123789123</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle" colspan="2">
                            <p class="mt-2">Agus Irawan<br>
                                BANK KEDAUNG<br>
                            </p>
                            </td>
                            <td class="align-middle text-end">
                            <b>123789123</b>
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
                    <a href="#" class="btn btn-success btn-md ">CHECKOUT</a>
                </div>
                </div>

            </form>
        </div>
    </div>
    </div>
</section>
@endsection