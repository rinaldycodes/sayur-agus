@extends('templates.frontend.master-login') @section('title', 'Register')
@section('content')
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path
        fill="#198754"
        fill-opacity="1"
        d="M0,256L24,240C48,224,96,192,144,186.7C192,181,240,203,288,208C336,213,384,203,432,176C480,149,528,107,576,74.7C624,43,672,21,720,48C768,75,816,149,864,192C912,235,960,245,1008,234.7C1056,224,1104,192,1152,154.7C1200,117,1248,75,1296,101.3C1344,128,1392,224,1416,272L1440,320L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z"
    ></path>
</svg>
<main class="form-signin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                @if (session('message'))
                <div class="alert alert-info text-dark">
                    {{ session("message") }}
                </div>
                @endif

                <form
                    action="{{ url('process-register') }}"
                    method="post"
                    class="card card-body shadow p-5"
                >
                    @csrf

                    <div class="header mb-3">
                        <h1 class="text-center h3 mb-3 fw-normal">Register</h1>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="visually-show mb-2"
                            >Nama Lengkap</label
                        >
                        <input
                            value="{{ old('name') }}"
                            type="text"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nama Lengkap"
                            required=""
                            autofocus=""
                            name="name"
                        />
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputNoTelp" class="visually-show mb-2"
                            >No. Telp / WA</label
                        >
                        <input
                            value="{{ old('no_telp') }}"
                            type="text"
                            id="inputNoTelp"
                            name="no_telp"
                            placeholder="Masuk No. Telp / WA"
                            required=""
                            class="form-control @error('no_telp') is-invalid @enderror"
                        />
                        @error('no_telp')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="visually-show mb-2"
                            >Email address</label
                        >
                        <input
                            value="{{ old('email') }}"
                            type="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan Email "
                            required=""
                            autofocus=""
                            name="email"
                        />
                        @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="inputPassword" class="visually-show mb-2"
                            >Password</label
                        >
                        <input
                            type="password"
                            id="inputPassword"
                            name="password"
                            placeholder="Password"
                            required=""
                            class="form-control @error('password') is-invalid @enderror"
                        />
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="button mb-5">
                        <button
                            class="w-100 btn btn-lg btn-success mb-3"
                            type="submit"
                        >
                            Register
                        </button>
                        <a
                            href="{{ url('/login') }}"
                            class="w-100 btn btn-lg btn-outline-success"
                            >Login</a
                        >
                        <hr />
                        <p class="text-center">
                            <a href="{{ url('/') }}">Home</a>
                        </p>
                    </div>
                    <p class="text-center">
                        {{ config("app.name") }} ??{{ date("Y") }} <br />
                        Created with
                        <i class="bi bi-heart-fill text-danger"></i> by
                        <a
                            class="text-dark fw-bold"
                            target="_blank"
                            href="https://instagram.com/tyaga.codes"
                            >?? ?? ?? g ??</a
                        >
                    </p>
                </form>
            </div>
        </div>
    </div>
</main>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path
        fill="#198754"
        fill-opacity="1"
        d="M0,32L24,48C48,64,96,96,144,128C192,160,240,192,288,176C336,160,384,96,432,112C480,128,528,224,576,240C624,256,672,192,720,192C768,192,816,256,864,256C912,256,960,192,1008,165.3C1056,139,1104,149,1152,181.3C1200,213,1248,267,1296,272C1344,277,1392,235,1416,213.3L1440,192L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"
    ></path>
</svg>
@endsection
