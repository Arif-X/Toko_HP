<!DOCTYPE html>
<html>
<head>
	<title>PRODUK | SIMPLE STORE</title>
	<meta charset="utf-8">
	<!-- Mobile Friendly Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link href="{{ URL::asset('img/favicon/favicon.png') }}" rel="icon">
	<link href="{{ URL::asset('img/favicon/apple-touch-icon.png') }}" rel="apple-touch-icon">

	<!-- JQuery Library -->
	<script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>

	<!-- Bootstrap CSS & JS Library -->
	<link rel="stylesheet" href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}">
	<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>

	<!-- Font CSS Library -->
	<link href="{{ URL::asset('lib/font/Montserrat.css') }}" rel="stylesheet">	
	<link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('lib/animate/animate.css') }}" rel="stylesheet">

	<!-- CSS Style -->
	<link rel="stylesheet" href="{{ URL::asset('css/product.css') }}">
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-light bg-lignt fixed-top shadow p-2 mb-1 bg-white">
        <a class="navbar-brand" href="#">SIMPLE STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk/kondisi/baru">Produk Baru</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk/kondisi/bekas">Produk Bekas</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Route::has('login'))
                        @auth
                        <a class="dropdown-item" href="/user">Profil</a>
                        <a class="dropdown-item" href="/pesanan">Pesanan</a>
                        <a class="dropdown-item" href="/checkout">Checkout</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">Daftar</a>
                        @endif
                        @endauth
                        @endif                       
                    </div>
                </li>
                <form action="/produk/cari" method="GET" class="form-inline my-2 my-lg-0" style="padding-left: 20px;">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Produk..." aria-label="Search" name="tipe" value="{{ old('cari') }}">
                    <button class="btn my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </ul>
        </div>
    </nav>

	<main class="py-4">
		@yield('content')
	</main>

	<a href="#" class="top"></a>
	<script src="{{ URL::asset('lib/animate/animate.js') }}"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>	
	<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ URL::asset('lib/jquery/jquery-3.2.1.slim.min.js') }}"></script>
	<script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>
	<script src="{{ URL::asset('lib/wow/wowinit.js') }}"></script>
</body>
</html>