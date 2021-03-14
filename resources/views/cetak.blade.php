<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('/frontend/libraries/bootstrap-5/css/bootstrap.min.css') }}">
    <!-- MY FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />

    <!-- MY CSS -->
    <title>Transaction - {{ Auth::user()->name }} - {{ session('transaction_id') }}</title>
</head>
<body>
    <section id="shipping" class="mb-5 mt-3">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                <h1 class="fs-2">CHECKOUT<i class="bi bi-truck+"></i></h1>
                <p>No. Invoice : <b>{{ $transaction->id }}</b></p>
                
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card-header bg-success">
                    </div>
                    <div class="card-body shadow ">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name">Nama Penerima</label>
                                    <p class="fw-bold">{{ $transaction->receiver_name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp">No. Whatsapp / No. Aktif </label>
                                    <p class="fw-bold">{{ $transaction->no_telp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Alamat</label>
                                    <p class="text-muted">
                                        <small>{{ $transaction->address }}</small>
                                    </p>
                                </div>
                                @if ($transaction->message)
                                <div class="mb-3">
                                    <label for="message" class="text-muted">Catatan untuk penjual</label>
                                    <p>{{$transaction->message}}</p>
                                </div>
                                @endif
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Status</label>
                                    <p class="text-danger">{{$transaction->transaction_status}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
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
                                <td class="align-middle text-center " colspan="2"> 
                                    @if( $transaction->payment == 'bni')
                                    <h6 class="fw-bold">BNI</h6>
                                    <small class="text-muted">Pembayaran via bank bca</small> <br>
                                    <small class="text-muted fw-bold">AGUS <br>
                                        NO.REK: 123-456-789
                                    </small>

                                    @elseif ( $transaction->payment == 'bca')
                                    <h6 class="fw-bold">BCA</h6>
                                    <small class="text-muted">Pembayaran via bank bca</small> <br>
                                    <small class="text-muted fw-bold">AGUS <br>
                                        NO.REK: 123-456-789
                                    </small>

                                    @else
                                    <h6 class="fw-bold">COD</h6>
                                    <small class="text-muted">Bayar ditempat anda</small>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </section>
    <footer class="text-center">
        <p class="fw-bold">{{ config('app.name')}} @2021</p>
    </footer>

    <script>
        window.print();
    </script>
</body>
</html>