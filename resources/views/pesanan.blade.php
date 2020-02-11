@extends('layouts.pesanan-layout')

@section('content')

<main role="main">	

	<div id="pesanan">

		@if ($message = Session::get('info'))
		<div class="alert alert-info alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/user">User</a></li>
				<li class="breadcrumb-item active" aria-current="page">Pesanan</li>
			</ol>
		</nav>		

		<div class="card">
			<div class="card-header">
				<strong>Pesanan Belum Dibayar</strong>
			</div>
			<div class="card-body">
				<div class="col-md-12" style="padding-bottom: 10px;">
					<table class="table table-bordered table-responsive">
						<tr class="text-center">
							<th colspan="2" width="50%">
								Detail Barang
							</th>
							<th width="17%">
								Harga
							</th>
							<th width="8%">
								Jumlah
							</th>
							<th width="17%">
								Total
							</th>
							<th width="8%">
								Status
							</th>
							<th width="">
								Edit/Hapus
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
							<td class="text-center">
								<a href="/pesanan/update/{{ $p->id }}" type="button" class="btn">Edit</a>
								<br>/<br>
								<form method="POST" action="/pesanan/hapus">
									@csrf
									<input type="" name="id_barang" value="{{ $p->id }}" hidden>
									<button type="submit" class="btn">Hapus</button>
								</form>
							</td>
						</tr>
						@endforeach
					</table>
				</div>

				<div class="col-md-12">
					<div class="card card-border-color">
						<div class="card-header">
							<strong>Total bayar</strong>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<h2 style="font-style: italic;">Jumlah Yang Dibayar</h2>		
								</div>
								<div class="col-md-6">

									@foreach($jml as $z)
									<h2 class="text-right">@currency($z->total)</h2>		
									@endforeach

								</div>
							</div>

							<div class="col-md-12" style="padding-top: 20px;">
								<a href="/checkout" class="btn" style="width: 100%;">Bayar Sekarang</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<br>
		<div class="card">
			<div class="card-header">
				<strong>Pesanan Diproses</strong>
			</div>
			<div class="card-body">
				<div class="col-md-12" style="padding-bottom: 10px;">
					<table class="table table-bordered table-responsive">
						<tr class="text-center">
							<th colspan="2" width="50%">
								Detail Barang
							</th>
							<th width="17%">
								Harga
							</th>
							<th width="8%">
								Jumlah
							</th>
							<th width="17%">
								Total
							</th>
							<th width="8%">
								Status
							</th>
						</tr>
						@foreach($status as $p)
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
		
		<br>
		<div class="card">
			<div class="card-header">
				<strong>Checkout Dikirim</strong>
			</div>
			<div class="card-body">
				<div class="col-md-12" style="padding-bottom: 10px;">
					<table class="table table-bordered table-responsive">
						<tr class="text-center">
							<th width="10%" style="vertical-align: middle;">
								ID Checkout
							</th>
							<th width="10%" style="vertical-align: middle;">
								Detail
							</th>
							<th width="47%"  style="vertical-align: middle;">
								Alamat Pengiriman
							</th>
							<th width="8%"  style="vertical-align: middle;">
								Jumlah Dibayar
							</th>
							<th width="17%"  style="vertical-align: middle;">
								Resi
							</th>
							<th width="8%"  style="vertical-align: middle;">
								Link Track
							</th>
						</tr>
						@foreach($pengiriman as $p)
						<tr>
							<td class="text-center" width="10%">
								<p>{{ $p->id_checkout }}</p>
							</td>
							<td class="text-center" width="10%">
								<p><a href="/pengiriman/{{ $p->id_checkout }}">Lihat</a></p>
							</td>
							<td width="57%">
								<p>{{ $p->alamat }}</p>
							</td>
							<td class="text-center" width="8%">
								<p>@currency($p->jumlah_dibayar)</p>
							</td>
							<td class="text-center" width="17%">
								<p>{{ $p->resi }}</p>
							</td>
							<td class="text-center" width="8%">
								<p><a href="{{ $p->link_resi }}">Link</a></p>
							</td>					
						</tr>
						@endforeach
					</table>
				</div>

			</div>
		</div>


		<br>
		<div class="card">
			<div class="card-header">
				<strong>Konfirmasi Pesanan Sudah Sampai</strong>
			</div>
			<div class="card-body">
				<div class="col-md-12" style="padding-bottom: 10px;">
					<table class="table table-bordered table-responsive">
						<tr class="text-center">
							<th width="10%" style="vertical-align: middle;">
								ID Checkout
							</th>
							<th width="10%" style="vertical-align: middle;">
								Detail
							</th>
							<th width="47%"  style="vertical-align: middle;">
								Alamat Pengiriman
							</th>
							<th width="8%"  style="vertical-align: middle;">
								Jumlah Dibayar
							</th>
							<th width="17%"  style="vertical-align: middle;">
								Resi
							</th>
							<th width="8%"  style="vertical-align: middle;">
								Link Track
							</th>
							<th width="8%"  style="vertical-align: middle;">
								Konfirmasi Penerimaan
							</th>
						</tr>
						@foreach($sampai as $p)
						<tr>
							<td class="text-center" width="10%">
								<p>{{ $p->id_checkout }}</p>
							</td>
							<td class="text-center" width="10%">
								<p><a href="/pengiriman/{{ $p->id_checkout }}">Lihat</a></p>
							</td>
							<td width="57%">
								<p>{{ $p->alamat }}</p>
							</td>
							<td class="text-center" width="8%">
								<p>@currency($p->jumlah_dibayar)</p>
							</td>
							<td class="text-center" width="17%">
								<p>{{ $p->resi }}</p>
							</td>
							<td class="text-center" width="8%">
								<p><a href="{{ $p->link_resi }}">Link</a></p>
							</td>
							<td class="text-center" width="8%">
								<form method="POST" action="/pesanan/konfirmasi-penerimaan">
									@csrf
									<input type="hidden" name="id_diterima" value="{{ $p->id_checkout }}">
									<button type="submit" class="btn">Konfirmasi</button>
								</form>
							</td>					
						</tr>
						@endforeach
					</table>
				</div>

			</div>
		</div>

	</div>

</main>

@endsection