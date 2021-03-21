@extends('templates.backend.master-admin') @section('title', 'Edit Transaksi' )
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center">
        <h1 class="h3 mb-2 text-gray-800">Edit Transaksi</h1>
        <small>{{$transaction->name}}</small>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form
            action="{{route('transactions.update', $transaction->id)}}"
            method="post"
        >
            @method('PUT') @csrf

            <div class="form-group">
                <label for="name">Nama Penerima</label>
                <input
                    readonly
                    type="text"
                    name="receiver_name"
                    class="form-control @error('receiver_name') is-invalid @enderror"
                    value="{{$transaction->receiver_name}}"
                />
                @error('receiver_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">No. Telp / WA</label>
                <input
                    readonly
                    type="text"
                    name="no_telp"
                    class="form-control @error('no_telp') is-invalid @enderror"
                    value="{{$transaction->no_telp}}"
                />
                @error('no_telp')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="payment">Payment</label>
                <input
                    readonly
                    type="text"
                    name="payment"
                    value="{{$transaction->payment->payment}}"
                    class="form-control @error('payment') is-invalid @enderror"
                />
                @error('payment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Status</label> <br />
                <small class="text-danger"
                    >Current: {{$transaction->transaction_status}}</small
                >
                <select
                    name="transaction_status"
                    class="form-control @error('transaction_status') is-invalid @enderror"
                >
                    <option value="">PILIH</option>
                    <option value="PENDING">PENDING</option>
                    <option value="SUCCESS">SUCCESS</option>
                    <option value="FAILED">FAILED</option>
                </select>
                @error('transaction_status')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <a
                    href="{{ route('transactions.index') }}"
                    class="btn btn-secondary"
                    >Batal</a
                >
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
