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
                    <small class=" badge badge-success">Sucess: 10</small>
                </div>
                <div class="col">
                    <small class=" badge badge-secondary">In Cart: 10</small>
                </div>
                <div class="col">
                    <small class=" badge badge-warning">Pending: 10</small>
                </div>
                <div class="col">
                    <small class=" badge badge-info">Cancel: 10</small>
                </div>
                <div class="col">
                    <small class=" badge badge-danger">Failed: 10</small>
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
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot class="text-center">
                            <tr>
                                <th>No. Invoice</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody class="text-center">
                            @forelse ($transactions as $transaction)
                           
                            <tr class="align-middle">
                                <td>
                                    <p><b>{{$transaction->name}}</b></p>
                                    
                                </td>
                                <td><small>Rp.{{ number_format($transaction->price,2,',','.')}}</small></td>
                                <td><a href="#"><i class="fas fa-image fs-1"></i> Galeri</a></td>
                                <td>{{$transaction->created_at}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm mb-1">
                                            <a href="{{route('transactions.edit', $transaction->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="col-sm mb-1">
                                        <form action="{{route('transactions.destroy', $transaction->id)}}" method="post" data-toggle="tooltip" data-placement="top" title="Delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <p>Tidak ada transaksi <a href="{{ route('transactions.create')}}">Buat produk</a></p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- /PRODUCT -->
@endsection