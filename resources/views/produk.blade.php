@extends('layouts.produk-layout')

@section('content')

<main role="main">	

	<div id="produk" class="container-fluid shadow-lg">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Produk</li>
			</ol>
		</nav>
		<div class="row" style="padding-bottom: 10px;">	
			@foreach($produk as $p)			
			<div class="col-md-3" style="margin-bottom: 10px;">
				<div class="card">
					<div class="card-header">
						<img src="{{ asset('storage/gambar/'.$p->gambar) }}" class="middle img-responsive" alt="">
						<p class="text-center">{{ $p->penggunaan }}</p>
					</div>
					<div class="card-body">
						<h4 class="text-center">{{ $p->tipe }}</h4>
						<p class="text-center">Harga : @currency($f->harga)</p>
						<a href="/pesan/produk/{{ $p->id }}" class="btn btn-outline-secondary" style="width: 100%;">Beli</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="col-md-12 style-padding">
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item">
						{{ $produk->links() }}
					</li>
				</ul>
			</nav>
		</div>
	</div>


	<div id="kredit" class="shadow-lg">	
		<div class="text-center" style="padding-top: 10px;">
			&copy; Copyright <strong>Simple Store</strong>. All Rights Reserved
		</div>
		<div class="text-center">
			Designed by <a href="https://github.com/Arif-X" target="_blank">Arif-X</a>
		</div>
	</div>


</main>

@endsection