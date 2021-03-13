<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('/frontend/libraries/bootstrap-5/css/bootstrap.min.css') }}">
    <!-- MY FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet" />

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />

    <!-- MY CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/styles/style.css') }}" />
    <title>{{config('app.name')}} - @yield('title')</title>
  </head>
  <body id="home">
    


    @if (session('message'))
        <div class="alert alert-info text-dark">{{ session('message') }}</div>
    @endif

    @yield('content')


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
  </body>
</html>
