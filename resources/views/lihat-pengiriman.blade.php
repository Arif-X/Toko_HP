@extends('layouts.pengiriman-layout')

@section('content')

<div id="pesanan">

	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
		</ol>
	</nav>

	<div class="col-md-12" style="padding-bottom: 10px;">
		<div class="card card-border-color">
			<div class="card-header">
				<strong>Detail Barang</strong>
			</div>
			<div class="card-body">
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
							<img src="{{ asset('storage/gambar/'.$p->foto) }}" alt="gambar" align="middle">
						</td>
						<td width="50%">
							<li>&ensp;{{ $p->nama_barang }}</li>
							<li class="keterangan">&ensp;Warna: {{ $p->warna }}</li>
							<li class="keterangan">&ensp;Penggunaan: {{ $p->penggunaan }}</li>
						</td>
						<td class="text-center" width="17%">
							<p>@currency($p->harga_satuan)</p>
						</td>
						<td class="text-center" width="8%">
							<p>{{ $p->jumlah_barang }}</p>
						</td>
						<td class="text-center" width="17%">
							<p>@currency($p->total_harga)</p>
						</td>
						<td class="text-center" width="8%">
							<p>{{ $p->status }}</p>
						</td>					
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-12" style="padding-bottom: 10px;">
		<div class="card card-border-color">
			<div class="card-header">
				<strong>Detail Pengiriman</strong>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-responsive">
					<tr class="text-center">
						<th width="35%">
							Kurir
						</th>
						<th width="60%">
							Resi
						</th>
						<th width="45%">
							Link Resi
						</th>
					</tr>
					@foreach($pengiriman as $p)
					<tr>
						<td class="text-center" width="30%">
							<p>J&T Express</p>
						</td>
						<td class="text-center" width="35%">
							<p>{{ $p->resi }}</p>
						</td>
						<td class="text-center" width="35%">
							<p>{{ $p->link_resi }}</p>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="card card-border-color">
			<div class="card-header">
				<strong>Dibayar</strong>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h2 style="font-style: italic;">Jumlah Yang Dibayar</h2>		
					</div>
					<div class="col-md-6">

						@foreach($jumlah as $z)
						<h2 class="text-right">@currency($z->jumlah_dibayar)</h2>		
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection