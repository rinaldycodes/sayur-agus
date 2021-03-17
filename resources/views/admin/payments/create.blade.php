@extends('templates.backend.master-admin') @section('title', 'Tambah Payment' )
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col text-center">
        <h1 class="h3 mb-2 text-gray-800">Tambah Payment</h1>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('payments.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Nama Payment</label>
                <input
                    type="text"
                    name="payment"
                    class="form-control @error('payment') is-invalid @enderror"
                    value="{{ old('payment') }}"
                />
                @error('payment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Atas Nama</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_rek">No. Rekening</label>
                <input
                    type="text"
                    name="no_rek"
                    maxlength="10"
                    class="form-control @error('no_rek') is-invalid @enderror"
                    value="{{ old('no_rek') }}"
                />
                @error('no_rek')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <a
                    href="{{ route('payments.index') }}"
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
