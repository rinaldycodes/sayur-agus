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
                    <div class="welcome-text">
                        <p>
                            Selamat datang <b>{{Auth::user()->name}}</b> di
                            {{ config("app.name") }}
                        </p>
                    </div>
                    @if($transactions->count() > 0)
                    <div class="tagihan">
                        <p>
                            {{Auth::user()->name}}, kamu punya tagihan yang
                            belum dibayar, dibawah ini
                        </p>
                        <ul>
                            @forelse ( $transactions as $transaction)
                            <li>
                                <a
                                    href="{{route('pesanan-kamu.show', $transaction->id)}}"
                                    class="btn btn-danger btn-md"
                                    >{{ $transaction->id }}
                                </a>
                            </li>
                            @empty @endforelse
                        </ul>
                        <p>
                            <a href="{{ url('/user/pesanan-kamu') }}" class=""
                                >CEK PESANAN</a
                            >
                        </p>
                    </div>
                    @endif
                    <span>Contact &rarr;</span>
                    <a
                        target="_blank"
                        rel="nofollow"
                        href="https://instagram.com/tyaga.codes"
                        >Developer
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
