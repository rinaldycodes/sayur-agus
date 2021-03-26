@extends('templates.backend.master-admin') @section('title', 'Semua Transaksi' )
@section('content')
<!-- Page Heading -->
<div class="row align-items-center">
    <div class="col">
        <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
    </div>
    <div class="col text-right">
        <div class="row">
            <div class="col">
                <small class="badge badge-secondary"
                    >All: {{ $countAll }}
                </small>
            </div>
            <div class="col">
                <small class="badge badge-success"
                    >Sucess: {{ $countSuccess }}</small
                >
            </div>
            <div class="col">
                <small class="badge badge-danger"
                    >Pending: {{ $countPending }}</small
                >
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
                                    >{{$transaction->payment->payment}}</b
                                >
                            </p>
                        </td>

                        <?php 
                            $status = $transaction->transaction_status; $value =
                        ($status == 'PENDING') ? "text-danger" : (( $status ==
                        'SUCCESS') ? "text-success" : ""); ?>

                        <td class="{{ $value }}">
                            {{$transaction->transaction_status}}
                        </td>
                        <td>
                            <small
                                >Rp.{{ number_format($transaction->transaction_total,0,',','.')}}</small
                            >
                        </td>
                        <td>
                            <div class="row d-flex justify-content-center">
                                <a
                                    href="{{route('transactions.edit', $transaction->id)}}"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Edit"
                                    class="btn btn-sm m-1 btn-success"
                                    ><i class="fas fa-edit"></i
                                ></a>
                                <a
                                    href="{{route('transactions.show', $transaction->id)}}"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Detail"
                                    class="btn btn-sm m-1 btn-info"
                                    ><i class="fas fa-eye"></i
                                ></a>
                                <form
                                    action="{{route('transactions.destroy', $transaction->id)}}"
                                    method="POST"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Delete"
                                >
                                    @csrf @method('DELETE')

                                    <button
                                        class="btn btn-sm m-1 btn-danger"
                                        type="submit"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty @endforelse
                </tbody>
                <tr class="text-center">
                    <td colspan="4">
                        <b>Total Success Transaction:</b>
                    </td>
                    <td>
                        <STRONG class="text-success"
                            >Rp.{{
                                number_format($totalSuccess, 0, ",", ".")
                            }}</STRONG
                        >
                    </td>
                </tr>
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
