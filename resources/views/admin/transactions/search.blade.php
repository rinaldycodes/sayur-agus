@extends('templates.backend.master-admin') @section('title', 'Laporan' )
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-center text-gray-800">
            Laporan Periode <br />
            {{ date("d M Y", strtotime($date1)) }} -
            {{ date("d M Y", strtotime($date2)) }}
        </h1>
    </div>
    <div class="card-body">
        <form action="{{ route('laporan.true') }}" method="POST">
            @csrf
            <div class="row justify-content-center py-5">
                <div class="col-lg-3">
                    @csrf
                    <div class="my-3">
                        <label for="">Pilih Tanggal Dari</label>
                        <input
                            type="date"
                            name="date1"
                            id="dt"
                            class="form-control"
                            value="{{ $date1 }}"
                        />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="my-3">
                        <label for="">Sampai Tanggal</label>
                        <input
                            type="date"
                            name="date2"
                            id="dt"
                            class="form-control"
                            value="{{ $date2 }}"
                        />
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="my-3">
                        <label for="">Search</label>
                        <button
                            name="search"
                            type="submit"
                            class="form-control btn btn-success"
                        >
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="my-3">
                        <label for="">Print</label>
                        <button
                            name="print"
                            type="submit"
                            class="form-control btn btn-primary"
                        >
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
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
                                </tr>
                            </thead>
                            <tfoot class="text-center">
                                <tr>
                                    <th>No. Invoice</th>
                                    <th>Penerima</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Total</th>
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
                                        $status = $transaction->transaction_status;
                                    $value = ($status == 'PENDING') ?
                                    "text-danger" : (( $status == 'SUCCESS') ?
                                    "text-success" : ""); ?>

                                    <td class="{{ $value }}">
                                        {{$transaction->transaction_status}}
                                    </td>
                                    <td>
                                        <small
                                            >Rp.{{ number_format($transaction->transaction_total,0,',','.')}}</small
                                        >
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
                                            number_format(
                                                $totalSuccess,
                                                0,
                                                ",",
                                                "."
                                            )
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
                                        >Rp.{{
                                            number_format($total, 0, ",", ".")
                                        }}</STRONG
                                    >
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
