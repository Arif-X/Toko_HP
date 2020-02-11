@extends('layouts.pesan-layout')

@section('content')

<main role="main">	

	<div id="user">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="/pesanan">Pesanan</a></li>
				<li class="breadcrumb-item active" aria-current="page">Ubah Pesanan</li>
			</ol>
		</nav>

		<div class="row">

			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<strong>Foto</strong>
					</div>
					<div class="card-body">
						@foreach($produk as $p)
						<form method="POST" action="/pesanan/update-pesanan/update" enctype="multipart/form-data">
							<div class="col-md-12">
								<img src="{{ asset('storage/gambar/'.$p->foto) }}" class="img-fluid mx-auto d-block border-radius-10px" alt="img1" name="asli">
							</div>
							<input type="text" class="form-control" name="gambar" value="{{ $p->gambar }}" readonly hidden>    
							<br>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card">
						<div class="card-header">
							<strong>Detail</strong>
						</div>						
						<div class="card-body">
							@foreach($produk as $p)
							@csrf
							<div class="form-group row">
								<label for="id_brg" class="col-sm-3 col-form-label">ID Barang</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="id_brg" name="id_brg" value="{{ $p->id }}" readonly>
								</div>
							</div>	
							<div class="form-group row">
								<label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $p->nama_barang }}" readonly>
								</div>
							</div>								
							<div class="form-group row">
								<label for="warna" class="col-sm-3 col-form-label">Warna</label>
								<div class="col-sm-9">
									<div class="custom-control custom-radio">
										<input type="radio" id="warna1" name="warna" class="custom-control-input" value="{{ $p->warna }}">
										<label class="custom-control-label" for="warna1"><strong>{{ $p->warna }}</strong></label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" id="warna2" name="warna" class="custom-control-input" value="Kuning">
										<label class="custom-control-label" for="warna2"><strong>Kuning</strong></label>
									</div>
									<div class="custom-control custom-radio">
										<input type="radio" id="warna3" name="warna" class="custom-control-input" value="Merah">
										<label class="custom-control-label" for="warna3"><strong>Merah</strong></label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="penggunaan" class="col-sm-3 col-form-label">Penggunaan</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="penggunaan" name="penggunaan" value="{{ $p->penggunaan }}" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="harga_satuan" class="col-sm-3 col-form-label">Harga Satuan</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ $p->harga_satuan }}" readonly>
								</div>
							</div>
							<div class="form-group row">
								<label for="jumlah_barang" class="col-sm-3 col-form-label">Jumlah Barang</label>
								<div class="col-sm-7">
									<select class="form-control" id="jumlah_barang" name="jumlah_barang">
										<option>{{ $p->jumlah_barang }}</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</div>
								<input class="btn btn-primary" type="button" id="btnHitung" value="Hitung" onclick="kali();">
								<script type="text/javascript">
									function kali(){
										nilai1 = document.getElementById("harga_satuan").value;
										nilai2 = document.getElementById("jumlah_barang").value;
										kali = nilai1*nilai2;
										document.getElementById("total").value =  kali;
									}
								</script>
							</div>							
							<div class="form-group row">								
								<label for="total" class="col-sm-3 col-form-label">Total</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="total" name="total" readonly value="{{ $p->total_harga }}">
								</div>
							</div>
							<div class="col-md-12" style="padding-top: 7px;">
								<button type="submit" class="btn" style="width: 100%;">Ubah Pesanan</button>
							</div>
							@endforeach
						</div>						
					</form>
				</div>			
			</div>
		</div>

	</div>

</main>

@endsection