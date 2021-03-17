@extends('templates.backend.master-admin') @section('title', 'Semua Pesanan
Kamu' ) @section('content')
<!-- Page Heading -->
<div class="row align-items-center">
    <div class="col">
        <h1 class="h3 mb-2 text-gray-800">Pesanan Kamu</h1>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3"></div>
    <div class="card-body">
        <div class="table-responsive">
            <table
                class="table table-bordered table-striped table-hover"
                id="myTable"
                width="100%"
                cellspacing="0"
            >
                <thead class="text-center">
                    <tr>
                        <th>No. Invoice</th>
                        <th>Penerima</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot class="text-center">
                    <tr>
                        <th>No. Invoice</th>
                        <th>Penerima</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody class="text-center">
                    @forelse ($transactions as $transaction)

                    <tr class="align-middle">
                        <td>
                            <p>
                                <b>{{$transaction->id}}</b>
                            </p>
                        </td>
                        <td>
                            <p>{{$transaction->receiver_name}}</p>
                        </td>
                        <td>
                            <p>
                                <b
                                    class="text-uppercase"
                                    >{{ $transaction->payment ? $transaction->payment->payment : ''}}</b
                                >
                            </p>
                        </td>
                        <td
                            class="{{$transaction->transaction_status == 'PENDING' 
                                ? 'text-danger' 
                                : 'text-success'}}"
                        >
                            {{$transaction->transaction_status }}
                        </td>
                        <td>
                            <small
                                >Rp.{{ number_format($transaction->transaction_total,0,',','.')}}</small
                            >
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm mb-1">
                                    <a
                                        href="{{route('pesanan-kamu.show', $transaction->id)}}"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Detail"
                                        class="btn btn-sm btn-info"
                                        ><i class="fas fa-eye"></i
                                    ></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <p class="text-info">Tidak ada Pesanan</p>
                    @endforelse
                </tbody>

                <tr class="text-center">
                    <td colspan="4">
                        <b>Total All:</b>
                    </td>
                    <td>
                        <STRONG class="text-primary"
                            >Rp.{{ number_format($total, 0, ",", ".") }}</STRONG
                        >
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
