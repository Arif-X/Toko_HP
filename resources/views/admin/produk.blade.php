@extends('layouts.admin.admin-produk')

@section('content')

<main role="main">	

	<div id="produk" class="container-fluid shadow-lg">

		@if ($message = Session::get('info'))
		<div class="alert alert-info alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Produk</li>
			</ol>
		</nav>
		<div class="row" style="padding-bottom: 10px;">	
			@foreach($produk as $p)			
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<img src="{{ asset('storage/gambar/'.$p->gambar) }}" class="middle img-responsive" alt="">
					</div>
					<div class="card-body">
						<h4 class="text-center">{{ $p->tipe }}</h4>
						<li>Harga : Rp. {{ $p->harga }}</li>
						<li>Warna 1 : {{ $p->warna1 }}</li>
						<li>Warna 2 : {{ $p->warna2 }}</li>
						<li>Warna 3 : {{ $p->warna3 }}</li>
						<li>Penggunaan : {{ $p->penggunaan }}</li>
						<li>Kondisi : {{ $p->keterangan }}</li>
						<br>
						<a href="/admin/produk/edit/{{ $p->id }}" class="btn btn-outline-secondary" style="width: 100%;">Edit</a>
					</div>
				</div>
			</div>
			@endforeach			
		</div>
		<div class="col-md-12">
			<a href="/admin/produk/tambah/" class="btn btn-outline-secondary" style="width: 100%;">Tambah</a>
		</div>
		<br>
	</div>
</main>

<div id="kredit" class="shadow-lg">	
	<div class="text-center" style="padding-top: 10px;">
		&copy; Copyright <strong>Simple Store</strong>. All Rights Reserved
	</div>
	<div class="text-center">
		Designed by <a href="https://github.com/Arif-X" target="_blank">Arif-X</a>
	</div>
</div>

@endsection