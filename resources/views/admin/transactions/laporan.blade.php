@extends('templates.backend.master-admin') @section('title', 'Semua Laporan' )
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('laporan.true') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="my-3">
                        <label for="">Pilih Tanggal Dari</label>
                        <input
                            type="date"
                            name="date1"
                            id="dt1"
                            class="form-control"
                        />
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="my-3">
                        <label for="">Sampai Tanggal</label>
                        <input
                            type="date"
                            name="date2"
                            id="dt2"
                            class="form-control"
                        />
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="my-3">
                        <button
                            name="search"
                            type="submit"
                            class="form-control btn btn-success btn-lg"
                        >
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                    <div class="my-3">
                        <p id="result"></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /PRODUCT -->
@endsection
