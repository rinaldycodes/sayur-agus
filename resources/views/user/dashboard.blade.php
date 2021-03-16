@extends('templates/backend/master-admin') @section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-success">
                    <h6 class="m-0 font-weight-bold text-white">Welcome!</h6>
                </div>
                <div class="card-body">
                    <p>
                        Selamat datang <b>{{Auth::user()->name}}</b> di
                        {{ config("app.name") }}
                    </p>
                    <a
                        target="_blank"
                        rel="nofollow"
                        href="https://instagram.com/bangbre.haha"
                        >Developer &rarr;</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
