@extends('layouts.admin.admin-pesanan')

@section('content')

<div id="pesanan">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pesanan User</li>
		</ol>
	</nav>

	<div class="col-md-12" style="padding-bottom: 10px;">
		@foreach($pemesan as $p)
		<h2 style="font-style: italic;">Pemesan {{ $p->name }}</h2>
		@endforeach
		<table class="table table-bordered table-responsive">
			<tr class="text-center">
				<th colspan="2">
					Detail Barang
				</th>
				<th>
					Harga
				</th>
				<th>
					Jumlah
				</th>
				<th>
					Total
				</th>
				<th>
					Status
				</th>
			</tr>
			@foreach($pesanan as $p)
			<tr>	
				<td class="text-center">
					<img src="{{ asset('storage/gambar/'.$p->gambar) }}" alt="gambar" align="middle">
				</td>
				<td width="50%">
					<li>&ensp;{{ $p->nama_barang }}</li>
					<li class="keterangan">&ensp;Warna: {{ $p->warna }}</li>
					<li class="keterangan">&ensp;Penggunaan: {{ $p->penggunaan }}</li>
				</td>
				<td class="text-center" width="17%">
					<p>{{ $p->harga_satuan }}</p>
				</td>
				<td class="text-center" width="8%">
					<p>{{ $p->jumlah_barang }}</p>
				</td>
				<td class="text-center" width="17%">
					<p>{{ $p->total_harga }}</p>
				</td>
				<td class="text-center" width="8%">
					<p>{{ $p->status }}</p>
				</td>					
			</tr>
			@endforeach
		</table>
	</div>

	<div class="col-md-12">
		<div class="card card-border-color">
			<div class="card-header">
				<strong>Bayar Sekarang</strong>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h2 style="font-style: italic;">Jumlah Yang Dibayar</h2>		
					</div>
					<div class="col-md-6">
						@foreach($jml as $z)
						<h2 class="text-right">Rp. {{ $z->total }}</h2>		
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection