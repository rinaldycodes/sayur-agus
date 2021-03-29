<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
            crossorigin="anonymous"
        />

        <title>Reset Password</title>
    </head>
    <body>
        @if (session('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session("message") }}.
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        </div>
        @endif
        <div class="container" style="padding-top: 5cm">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h1>Reset Password</h1>
                    <small class="text-muted">
                        Masukan password baru kamu, jangan menggunakan yang
                        lama!
                    </small>
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf

                        <input
                            type="text"
                            name="token"
                            hidden
                            value="{{ $token }}"
                        />

                        <div class="mb-3">
                            <label for="" class="my-3">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control w-75"
                                placeholder="Masukan Email..."
                            />
                        </div>

                        <div class="mb-3">
                            <label for="" class="my-3">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control w-75"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="" class="my-3"
                                >Password Konfirmasi</label
                            >
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control w-75"
                            />
                        </div>

                        <button type="submit" class="btn btn-success">
                            Send Reset Link
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"
        ></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    --></body>
</html>
