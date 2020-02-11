@extends('layouts.admin.admin-checkout')

@section('content')

<div id="pesanan">

	@if ($message = Session::get('info'))
	<div class="alert alert-info alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>    
		<strong>{{ $message }}</strong>
	</div>
	@endif

	<div class="col-md-12" style="padding-bottom: 10px;">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Checkout</li>
			</ol>
		</nav>

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
						<th width="45%">
							Edit
						</th>
						<th width="45%">
							Barang Sampai
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
							<p><a href="{{ $p->link_resi }}">Link</a></p>
						</td>
						<td class="text-center" width="35%">

							<button type="button" class="btn" data-toggle="modal" data-target="#editModal">
								Edit
							</button>							

						</td>
						<td class="text-center" width="35%">
							<form method="POST" action="/admin/checkout/set-sampai">
								@csrf
								<input type="hidden" name="id_sampai" value="{{ $p->id_checkout }}">
								<input type="hidden" name="sampai" value="Sampai Tujuan">
								<button type="submit" class="btn">
									Set Sampai
								</button>
							</form>
						</td>					
					</tr>
					@endforeach

					<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modal-label">Edit Detail Pengiriman</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="POST" action="/admin/checkout/konfirmasi-pengiriman">
									@csrf
									<div class="modal-body">
										@foreach($checkout as $c)
										<input type="text" name="id_pengiriman" value="{{ $c->id }}" readonly hidden>
										<input type="text" name="id_checkout" value="{{ $c->id }}" readonly hidden>	
										@endforeach							
										<div class="form-group row">
											<label for="kurir" class="col-sm-3 col-form-label text-right">Kurir</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="kurir" name="kurir" value="J&T" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="resi" class="col-sm-3 col-form-label text-right">Resi</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="resi" name="resi" value="">
											</div>
										</div>
										<div class="form-group row">
											<label for="link_resi" class="col-sm-3 col-form-label text-right">Link Resi</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="link_resi" name="link_resi" value="">
											</div>
										</div>											
									</div>
									<div class="modal-footer">
										<button type="button" class="btn" data-dismiss="modal">Tutup</button>
										<button type="submit" class="btn">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</table>
				<button type="button" class="btn col-md-12" data-toggle="modal" data-target="#editModal">
					Edit/Tambah
				</button>

				<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modal-label">Edit Detail Pengiriman</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							@foreach($pengiriman as $p)
							<form method="POST" action="/admin/checkout/konfirmasi-pengiriman">
								@csrf
								<div class="modal-body">	
									<input type="text" name="id_pengiriman" value="{{ $p->id }}" readonly hidden>
									<input type="text" name="id_checkout" value="{{ $p->id_checkout }}" readonly hidden>									
									<div class="form-group row">
										<label for="kurir" class="col-sm-3 col-form-label text-right">Kurir</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="kurir" name="kurir" value="J&T" readonly>
										</div>
									</div>
									<div class="form-group row">
										<label for="resi" class="col-sm-3 col-form-label text-right">Resi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="resi" name="resi" value="{{ $p->resi }}">
										</div>
									</div>
									<div class="form-group row">
										<label for="link_resi" class="col-sm-3 col-form-label text-right">Link Resi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="link_resi" name="link_resi" value="{{ $p->link_resi }}">
										</div>
									</div>											
								</div>
								<div class="modal-footer">
									<button type="button" class="btn" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn">Simpan</button>
								</div>
							</form>
							@endforeach
						</div>
					</div>
				</div>

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