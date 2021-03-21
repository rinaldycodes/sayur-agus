@extends('templates.frontend.master')

@section('title', 'Checkout' )

@section('content')

<!--  CHECKOUT -->
<section id="shipping" class="mb-5">
    <div class="container">
        <div class="row text-center">
            <div class="col">
            <h1 class="fs-2">CHECKOUT<i class="bi bi-truck+"></i></h1>
            <p>No. Invoice : <b>{{ $transaction->id }}</b></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-header bg-success">
                    <h2 class="fs-6 text-white">Customer</h2>
                </div>
                <div class="card-body shadow ">
                        <div class="mb-3">
                            <label for="name">Nama Penerima</label>
                            <p class="fw-bold">{{ $transaction->receiver_name }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp">No. Whatsapp / No. Aktif </label>
                            <p class="fw-bold">{{ $transaction->no_telp }}</p>
                        </div>
                        <div class="mb-5">
                            <label for="address">Alamat</label>
                            <p class="fw-bold">{{ $transaction->address }}</p>
                        </div>
                        <div class="mb-5">
                            <label for="address">Status</label>
                            <p class="fw-bold">{{ $transaction->transaction_status }}</p>
                            @if ($transaction->transaction_status == 'PENDING')
                            <p class="text-danger">Transaksi ini belum dibayar, silahkan bayar dan lakukan konfirmasi pembayaran</p>
                            @endif
                        </div>
                        @if ($transaction->message)
                        <div class="mb-5">
                            <label for="message" class="text-muted">Catatan untuk penjual</label>
                            <p>{{$transaction->message}}</p>
                        </div>
                        @endif
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-5">
                <div class="card-header bg-success text-white">
                    <h2 class="fs-6">Details</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Product</th>
                            <th class="text-end">Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                        
                        @forelse ($transactionDetails as $row)
                        <tr>
                            <td class="align-middle">
                                <p>
                                    <b class="title-product">
                                        {{ $row->product['name']}}
                                    </b>
                                </p>
                                    <span class="text-muted">Price: Rp. {{ number_format($row->product['price'], 0,'.','.') }}</span>
                            </td>
                            <td class="align-middle text-end">
                                <p>{{ $row->qty }}</p>
                            </td>
                            <td class="align-middle text-end">
                                <p class="fw-bold">Rp.{{ number_format($row->sub_total, 0,'.','.') }}</p>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3"><h6>No Data</h6></td>
                        </tr>
                        @endforelse

                        <tr>
                            <td colspan="2">
                                <p class="fs-5" >Ongkir</p>
                            </td>
                            
                            <td class="align-middle text-end">
                                <p ><bold>Rp.{{ number_format($transaction->ongkir, 0,'.','.') }}</bold></p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <p class="fs-5" >Total</p>
                            </td>
                            
                            <td class="align-middle text-end">
                                <p class="fs-5"><strong>Rp.{{ number_format($transaction->transaction_total, 0,'.','.') }}</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle" >
                                <p class="fs-5" >Payment</p>
                            </td>
                            <td class="align-middle text-end " colspan="2"> 
                                <p class="text-uppercase fw-bold">{{ $transaction->payment ? $transaction->payment->payment : ''}}</p>
                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        @foreach( $payments as $payment)
                        <div class="col-md-4 card-body text-center">
                            <h6 class="fw-bold">{{ $payment->payment }}</h6>
                            <small class="text-muted">{{ $payment->name }}</small> <br>
                            <small class="fw-bold">{{ $payment->no_rek }}</small>
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col">
                        <a href="{{url('/user/pesanan-kamu')}}" class="btn btn-secondary btn-md ">RIWAYAT PESANAN </a>
                    </div>
                    <div class="col text-end">
                        <a href="{{route('cetak', $transaction->id )}}" class="btn-success btn-md btn"> <i class="bi bi-printer-fill"></i> CETAK</a>
                    </div>
                </div>

            </form>
        </div>
        </div>
    </div>
</section>
@endsection