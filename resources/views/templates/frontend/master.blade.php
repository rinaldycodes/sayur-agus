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
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
      <?php  $categories = App\Models\Category::get(); ?>
      <div class="container">
        <a class="navbar-brand" href="{{ url('/#home') }}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/#home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/#for-you') }}">For You <i class="bi bi-heart-fill"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/#product') }}">Product</a>
            </li>
            @forelse ( $categories as $category)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/p', $category->slug) }}">{{$category->name}}</a>
            </li>
            @empty
            @endforelse
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/#about') }}">About</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="{{ url('/cart') }}" class="nav-link d-none d-lg-block" title="keranjang belanja">
                <small class="badge bg-danger">{{Cart::count()}}</small>
                <i class="bi bi-basket"></i>
                <small>Cart</small>
              </a>
            </li>
            @auth
              @if(Auth::user()->role == 'ADMIN')
              <li class="nav-item">
                <a class="nav-link" href="{{url('/admin')}}">Dashboard</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{url('/user')}}">Dashboard</a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link" href="{{url('/logout')}}">Logout</a>
              </li>
            @endauth
            
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{url('/login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/register')}}">Register</a>
            </li>
            @endguest
            <li class="nav-item">
              <a href="./cart.html" class="nav-link d-md-block d-lg-none" title="keranjang belanja"><i class="bi bi-basket"></i> <small>Cart</small></a>
            </li>
          </ul>
        </div>
      </div>

    
    </nav>
    <!-- /NAVBAR -->
    
    <!-- ///////// FLASH DATA ///////// -->
    @if (session('message'))
    <div class="alert alert-info alert-dismissible fade show fixed-bottom" role="alert">
      {{ session('message') }}.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @yield('content')

    <section id="contact" class="bg-success pb-5">
      <div class="container text-md-center">
        <div class="row text-white">
          <div class="col-md-6 mb-5">
            <h2 class="fs-3">Get In Touch</h2>
            <ul>
              <li>Bekasi, Indonesia</li>
              <li>0882-1234-4567</li>
            </ul>
          </div>
          <div class="col-md-6 mb-5">
            <h2 class="fs-3">Follow Us</h2>
            <ul>
              <li><a href="http://instagram.com" class="text-white" target="_blank" rel="noopener noreferrer">Instagram</a></li>
              <li><a href="http://twitter.com" class="text-white" target="_blank" rel="noopener noreferrer">Twitter</a></li>
            </ul>
          </div>
        </div>
      </div>
      </div>
    </section>
    <footer class="bg-success text-white pb-5">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a class="text-white fw-bold" target="_blank" href="https://instagram.com/tyaga.codes">т у α g α</a></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
  </body>
</html>
