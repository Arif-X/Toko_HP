<!DOCTYPE html>
<html>
<head>
	<title>USER | SIMPLE STORE</title>
	<meta charset="utf-8">
	<!-- Mobile Friendly Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link href="img/favicon/favicon.png" rel="icon">
	<link href="img/favicon/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- JQuery Library -->
	<script src="lib/jquery/jquery.min.js"></script>

	<!-- Bootstrap CSS & JS Library -->
	<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>

	<!-- Font CSS Library -->
	<link href="lib/font/Montserrat.css" rel="stylesheet">	
	<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="lib/animate/animate.css" rel="stylesheet">

	<!-- CSS Style -->
	<link rel="stylesheet" href="css/user.css">
</head>
<body>

	<nav class="navbar navbar-expand-md navbar-light bg-lignt fixed-top shadow p-2 mb-1 bg-white">
		<a class="navbar-brand" href="/">SIMPLE STORE</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="/user">Profil</a></li>
				<li class="nav-item"><a class="nav-link" href="/pesanan">Pesanan</a></li>
				<li class="nav-item"><a class="nav-link" href="/checkout">Checkout</a></li>
				<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
				</a></li>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
				<form action="/produk/cari" method="GET" class="form-inline my-2 my-lg-0" style="padding-left: 20px;">
					<input class="form-control mr-sm-2" type="search" placeholder="Cari Produk..." aria-label="Search" name="tipe" value="{{ old('cari') }}">
					<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
				</form>			
			</ul>
		</div>
	</nav>

	<main class="py-4">
		@yield('content')
	</main>

	<a href="#" class="top"></a>
	<script src="lib/animate/animate.js"></script>
	<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>	
	<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="lib/jquery/jquery-3.2.1.slim.min.js"></script>
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	<script src="lib/wow/wowinit.js"></script>
</body>
</html>