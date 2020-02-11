@extends('layouts.checkout-layout')

@section('content')

<main role="main">	

	<div id="bayar">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/user">User</a></li>
				<li class="breadcrumb-item active" aria-current="page">Checkout</li>
			</ol>
		</nav>
		<div class="row" style="padding-bottom: 10px;">	
			<div class="col-md-6" style="padding-top: 10px;">
				<form method="POST" action="/checkout/store" enctype="multipart/form-data">
					@csrf
					<div class="card">										
						<div class="card-header">
							Cara Pembayaran
						</div>								
						<div class="card-body">
							<div class="custom-control custom-radio">
								<input type="radio" id="bank" name="metode" class="custom-control-input" value="Bank">
								<label class="custom-control-label" for="bank" required><strong>Bank</strong></label>
								<br><strong>Deskripsi: </strong><br>
								Untuk Pembayaran Via Bank, Bisa Membayar Ke No. Rekening Berikut: <br>
								<ul>
									<li>BRI: 124152390712356189 </li>
									<li>BNI: 124152390712356189 </li>
									<li>BTN: 124152390712356189 </li>
									<li>BCA: 124152390712356189 </li>
								</ul>
								<strong>Warning!</strong>&ensp;Semua No. Rekening Atas Nama CV, Bukan Perorangan.<br>
							</div>
							<br>
							<div class="custom-control custom-radio">
								<input type="radio" id="paypal" name="metode" class="custom-control-input" value="Paypal">
								<label class="custom-control-label" for="paypal"><strong>Paypal</strong></label>
								<br><strong>Deskripsi: </strong><br>
								Untuk Pembayaran Via Paypal, Bisa Membayar Pada Email Berikut: <br>
								<ul>
									<li>simplestore@store.store</li>
								</ul>
								<strong>Warning!</strong>&ensp;Periksa Dengan Teliti Dalam Mengisi Email.<br>
								<strong>Setelah Checkout Pesanan Akan Diperiksa</strong><br>
							</div>										
						</div>	
					</div>
					
				</div>

				<div class="col-md-6" style="padding-top: 10px;">
					<div class="card">
						<div class="card-header">
							Detail, Penerima, Alamat & Pembayaran
						</div>
						<div class="card-body">
							<div class="form-group row">
							</div>
							<div class="form-group row">
								<label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->name }}" required readonly>
								</div>
							</div>								
							<div class="form-group row">
								<label for="alamat-lengkap" class="col-sm-4 col-form-label">Alamat Lengkap</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="alamat-lengkap" name="alamat" value="{{ Auth::user()->alamat }}" required readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="bayaran" class="col-sm-4 col-form-label">Email/No. Rek.</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="bayaran" name="bayaran" required>
								</div>
							</div>							

							<div class="form-group row">
								<label for="bukti" class="col-sm-4 col-form-label">Bukti</label>
								<div class="col-sm-8">
									<input type="file" class="form-control" id="bukti" name="bukti" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="kode-pos" class="col-sm-4 col-form-label">Kode Pos</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="kode-pos" name="kode_pos" value="{{ Auth::user()->kode_pos }}" required readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="no-telp" class="col-sm-4 col-form-label">No. Telp.</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="no-telp" name="no_hp" value="{{ Auth::user()->no_hp }}" required readonly>
								</div>
							</div>
							@foreach($jml as $j)
							<div class="form-group row">
								<label for="jumlah" class="col-sm-4 col-form-label">Jumlah Dibayar Rp.</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $j->total }}" required readonly>
								</div>
							</div>
							@endforeach
							<div class="col-md-12" style="padding-top: 7px;">
								<button type="submit" class="btn" style="width: 100%;">Submit</button>
							</div>
							<div style="padding-top: 10px;">
								<strong>* Edit Profil Anda Untuk Mengganti Detail Pembayaran & Pengiriman</strong>
							</div>
						</div>
					</div>		
					
				</form>

			</div>				
		</div>				
	</div>

</main>

@endsection