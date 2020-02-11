<!DOCTYPE html>
<html>
<head>
    <title>HOME | SIMPLE STORE</title>
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
    <link rel="stylesheet" href="css/home.css">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-lignt fixed-top shadow p-2 mb-1 bg-white">
        <a class="navbar-brand" href="#">SIMPLE STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#intro">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#merek">Merek</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk/kondisi/baru">Produk Baru</a></li>
                <li class="nav-item"><a class="nav-link" href="/produk/kondisi/bekas">Produk Bekas</a></li>
                <li class="nav-item"><a class="nav-link" href="#alamat">Alamat</a></li>
                <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
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

    <header>
        <div id="intro">
            <div id="carouselExampleIndicators" class="carousel slide shadow-lg bg-white" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('img/carousel/1.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-4">First Slide</h2>
                            <!-- Add Slide Description -->
                            <p class="lead">This is a description for the first slide.</p>
                        </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('img/carousel/2.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-4">Second Slide</h2>
                            <!-- Add Slide Description -->
                            <!-- <p class="lead">This is a description for the second slide.</p> -->
                        </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('img/carousel/3.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="display-4">Third Slide</h2>
                            <!-- Add Slide Description -->
                            <!-- <p class="lead">This is a description for the third slide.</p> -->
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </header>

    <main role="main">    
        <div id="merek" class="container-fluid">
            <div class="wow fadeInUp" data-wow-duration="1s">
                <h1 class="text-center">Merek</h1>
                <div class="row" style="padding-top: 10px;">                
                    <div class="col-md-3">
                        <a href="/produk/merek/samsung">
                            <div class="card">
                                <img src="img/merek/samsung.png" class="middle img-responsive" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/produk/merek/iphone">
                            <div class="card">
                                <img src="img/merek/iphone.jpg" class="middle img-responsive" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/produk/merek/sony">
                            <div class="card">                          
                                <img src="img/merek/sony.jpg" class="middle img-responsive" alt=""> 
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/produk/merek/lg">
                            <div class="card">
                                <img src="img/merek/lg.png" class="middle img-responsive" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <a href="/produk/merek/google">
                            <div class="card">
                                <img src="img/merek/google.png" class="middle img-responsive" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/produk/merek/asus">
                            <div class="card">
                                <img src="img/merek/asus.png" class="middle img-responsive" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/produk/merek/nokia">
                            <div class="card">
                                <img src="img/merek/nokia.png" class="middle img-responsive" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="/produk/merek-lain/">
                            <div class="card">
                                <img src="img/merek/etc.png" class="middle img-responsive" alt="Lainnya">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div id="baru" class="container-fluid shadow-lg">
            <div class="wow fadeInUp" data-wow-duration="1s">
                <h1 class="text-center">Produk Baru</h1>
                <div class="row" style="padding-top: 20px; padding-bottom: 40px;">
                    @foreach($baru as $b)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="storage/gambar/{{ $b->gambar }}" class="middle img-responsive" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">{{ $b->tipe }}</h4>
                                <p class="text-center">Harga : Rp. {{ $b->harga }}</p>
                                <a href="/pesan/produk/{{ $b->id }}" class="btn" style="width: 100%;">Beli</a>
                            </div>
                        </div>
                    </div>
                    @endforeach  
                </div>
                <div class="col-md-12 style-padding">
                    <a href="/produk/kondisi/baru" class="btn" style="width: 100%;">Lihat Semua</a>
                </div>
            </div>
        </div>

        <div id="bekas" class="container-fluid shadow-lg">
            <div class="wow fadeInUp" data-wow-duration="1s">
                <h1 class="text-center">Produk Bekas</h1>
                <div class="row" style="padding-top: 20px;">
                    @foreach($bekas as $b)               
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <img src="storage/gambar/{{ $b->gambar }}" class="middle img-responsive" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="text-center">{{ $b->tipe }}</h4>
                                <p class="text-center">Harga : Rp. {{ $b->harga }}</p>
                                <a href="/pesan/produk/{{ $b->id }}" class="btn" style="width: 100%;">Beli</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-md-12 style-padding">
                    <a href="/produk/kondisi/bekas" class="btn" style="width: 100%;">Lihat Semua</a>
                </div>
            </div>
        </div>


        <div id="alamat" class="container-fluid shadow-lg">
            <h1 class="text-center">Alamat</h1>
            <div class="row" style="padding-top: 20px;">
                <div class="col-lg-6">
                    <div class="map mb-4 mb-lg-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8138206.360872714!2d107.51482461242895!3d-5.146526112007891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e751fc11165d059%3A0xcc8292d557cc9f77!2sLaut%20Jawa!5e0!3m2!1sid!2sid!4v1579523447317!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-5 info">
                            <i class="ion-ios-location-outline"></i>
                            <p>Jalan Terserah </p>
                        </div>
                        <div class="col-md-4 info">
                            <i class="ion-ios-email-outline"></i>
                            <p>email@email.email</p>
                        </div>
                        <div class="col-md-3 info">
                            <i class="ion-ios-telephone-outline"></i>
                            <p>+6288888888</p>
                        </div>
                    </div>

                    <div class="form">
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Tulis Sesuatu"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center">
                                <a href="" class="btn">Kirim Pesan </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div id="kontak" class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h2>SIMPLE STORE</h2>
                    <p>
                        <strong>Alamat:</strong> Jalan Terserah Kel./Ds. Kec. Kab. Prov<br>
                        <strong>Telpon:</strong> +6288888888<br>
                        <strong>Email:</strong> email@email.email<br>
                    </p>
                </div>
                <div class="col-md-2">
                    <h2>Rekber</h2>
                    <ul>
                        <li><a href="#">Bukalapak</a></li>
                        <li><a href="#">Tokopedia</a></li>
                        <li><a href="#">Shopee</a></li>
                        <li><a href="#">Lazada</a></li>
                        <li><a href="#">Blibli</a></li>
                        <li><a href="#">Blanja</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h2>Sosmed</h2>                 
                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook fa-2x padding-left-10px"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram fa-2x padding-left-10px"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus fa-2x padding-left-10px"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin fa-2x padding-left-10px"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2>Link</h2>
                    <ul>
                        <li><a href="#">Panduan</a></li>
                        <li><a href="#">Tracking Order</a></li>
                        <li><a href="#">Daftar Agen</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kredit">   
            <div class="text-center">
                &copy; Copyright <strong>Simple Store</strong>. All Rights Reserved
            </div>
            <div class="text-center">
                Designed by <a href="https://github.com/Arif-X" target="_blank">Arif-X</a>
            </div>
        </div>
    </footer>
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
