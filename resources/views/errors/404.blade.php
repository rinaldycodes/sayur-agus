<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::to('/frontend/libraries/bootstrap-5/css/bootstrap.min.css') }}">
    <title>ERROR 404</title>
</head>
<body >
    <main>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 40vh;">
            <div class="col-5 text-center">
                <h1 class="fs-3 text-center">ERROR 404</h1>
                <a href="{{url('')}}" class="">Home</a>
            </div>
        </div>
        <div class="row" style="margin-top: 40vh;">
            <div class="col text-center">
            <p>{{config('app.name')}} @ {{ date('Y') }}</p>
                <p>Developed by <a href="https://instagram.com/bangbre.haha" class="fw-bold">Tyaga</a></p>
            </div>
        </div>
    </div>
       
    </main>
</body>
</html>