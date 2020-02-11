<!DOCTYPE html>
<html>
<head>
	<title>PESANAN | SIMPLE STORE</title>
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
	<link rel="stylesheet" href="{{ URL::asset('admin/css/checkout.css') }}">
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-light bg-lignt fixed-top shadow p-2 mb-1 bg-white">
		<a class="navbar-brand" href="/">SIMPLE STORE</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="/admin/home">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="/admin/produk">Produk</a></li>
				<li class="nav-item"><a class="nav-link" href="/admin/checkout">Checkout</a></li>	
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