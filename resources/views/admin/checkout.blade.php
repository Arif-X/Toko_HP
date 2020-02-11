@extends('layouts.admin.admin-checkout')

@section('content')

<div id="check">

	@if ($message = Session::get('info'))
	<div class="alert alert-info alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>    
		<strong>{{ $message }}</strong>
	</div>
	@endif
	
	<div class="col-md-12" style="padding-bottom: 10px">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Daftar Checkout</li>
			</ol>
		</nav>
		<table class="table table-bordered table-responsive">
			<tr class="text-center">
				<th>
					ID Checkout
				</th>
				<th>
					ID Pemesan
				</th>
				<th>
					Nama Pemesan
				</th>
				<th>
					Jenis Pembayaran
				</th>
				<th>
					Alamat
				</th>
				<th>
					Email Paypal/No Rek.
				</th>
				<th>
					Kode Pos
				</th>
				<th>
					No HP.
				</th>
				<th>
					Jumlah Dibayar
				</th>
				<th>
					Bukti Pembayaran
				</th>
				<th>
					Status
				</th>
				<th>
					Setujui/Tolak
				</th>
			</tr>
			@foreach($check as $c)
			<tr>	
				<td>
					{{ $c->id }}
					<br>
					(<a href="/admin/checkout/id/{{ $c->id }}" target="_blank">Detail</a>)
				</td>
				<td>
					{{ $c->id_pembeli }}
					<br>
					(<a href="/admin/pesanan/user/{{ $c->id_pembeli }}" target="_blank">Daftar Pesanan</a>)
				</td>
				<td>
					{{ $c->name }}
				</td>
				<td>
					{{ $c->jenis_pembayaran }}	
				</td>
				<td>
					{{ $c->alamat }}	
				</td>
				<td>
					{{ $c->email_or_rek }}	
				</td>
				<td>
					{{ $c->kode_pos }}	
				</td>
				<td>
					{{ $c->no_hp }}	
				</td>
				<td>
					@currency($c->jumlah_dibayar)
				</td>
				<td>
					<a href="/storage/bukti/{{ $c->bukti }}" target="_blank">Lihat</a>
				</td>
				<td>
					{{ $c->status }}	
				</td>
				<td class="text-center">
					<form method="POST" action="/admin/checkout/setuju" class="text-center">	
						<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
						<input type="text" class="form-control" id="setuju" name="setuju" value="Diproses" readonly hidden>						
						<input type="text" class="form-control" id="id_setuju" name="id_setuju" value="{{ $c->id }}" readonly hidden>
						<input type="text" class="form-control" id="id_pemesan" name="id_pemesan" value="{{ $c->id_pembeli }}" readonly hidden>
						<button type="submit" class="btn" style="width: 100%">Setujui</button>
					</form>/<br>
					<form method="POST" action="/admin/checkout/tolak" class="text-center">
						<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}">
						<input type="text" class="form-control" id="tolak" name="tolak" value="Ditolak" required readonly hidden>
						<input type="text" class="form-control" id="id_tolak" name="id_tolak" value="{{ $c->id }}" required readonly hidden>
						<input type="text" class="form-control" id="id_pemesan" name="id_pemesan" value="{{ $c->id_pembeli }}" readonly hidden>
						<button type="submit" class="btn" style="width: 100%">Tolak</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection