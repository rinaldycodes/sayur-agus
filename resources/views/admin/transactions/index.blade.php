@extends('templates.backend.master-admin')

@section('title', 'Semua Transaksi'  )

@section('content')
    <!-- Page Heading -->
    <div class="row align-items-center">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
        </div>
        <div class="col text-right">
            <div class="row">
                <div class="col">
                    <small class=" badge badge-secondary">All: {{ $countAll }} </small>
                </div>
                <div class="col">
                    <small class=" badge badge-success">Sucess: {{ $countSuccess }}</small>
                </div>
                <div class="col">
                    <small class=" badge badge-danger">Pending: {{$countPending}}</small>
                </div>
            </div>
        </div>
        
    </div>
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Semua Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="myTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No. Invoice</th>
                                <th>Penerima</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>No. Invoice</th>
                                <th>Penerima</th>
                                <th>Payment</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center">
                            @forelse ($transactions as $transaction)
                           
                            <tr class="align-middle">
                                <td>
                                    <p><b>{{$transaction->id}}</b></p>
                                </td>
                                <td>
                                    <p>{{$transaction->receiver_name}}</p>
                                </td>
                                <td>
                                    <p><b class="text-uppercase">{{$transaction->payment}}</b></p>
                                </td>
                                <td><small>Rp.{{ number_format($transaction->transaction_total,0,',','.')}}</small></td>
                                <td>{{$transaction->transaction_status}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm mb-1">
                                            <a href="{{route('transactions.edit', $transaction->id)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-sm mb-1">
                                            <a href="{{route('transactions.show', $transaction->id)}}" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <p>Tidak ada transaksi <a href="{{ route('transactions.create')}}">Buat produk</a></p>
                            @endforelse
                            <tr>
                                <td colspan="3">
                                    <b>Total:</b>
                                </td>
                                <td>
                                    <STRONG>Rp.{{ number_format($total,0,',','.') }}</STRONG>
                                    </td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    <!-- /PRODUCT -->
@endsection