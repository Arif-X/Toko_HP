@extends('layouts.admin.admin-produk')

@section('content')

<main role="main">	

	<div id="addproduk" class="container-fluid">

		@if ($message = Session::get('info'))
		<div class="alert alert-info alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif
		
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
				<li class="breadcrumb-item"><a href="/admin/produk">Produk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
			</ol>
		</nav>
		<div class="col-md-9" style="margin-left: auto; margin-right: auto;">
			<div class="card">
				<div class="card-header">
					Tambah Produk
				</div>
				<div class="card-body">
					<form method="POST" action="/admin/produk/tambah/add" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="merek" class="col-sm-3 col-form-label">Merek</label>
							<div class="col-sm-9">
								<select class="form-control" name="merek">
									<option class="disabled">Pilih Merek</option>
									<option>Samsung</option>
									<option>IPhone</option>
									<option>Sony</option>
									<option>LG</option>
									<option>Google</option>
									<option>Asus</option>
									<option>Nokia</option>
								</select>
							</div>
						</div>	
						<div class="form-group row">
							<label for="tipe" class="col-sm-3 col-form-label">Tipe Produk</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="tipe" name="tipe">
							</div>
						</div>
						<div class="form-group row">
							<label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
							<div class="col-sm-9">
								<input type="file" class="form-control" id="gambar" name="gambar">
							</div>
						</div>
						<div class="form-group row">
							<label for="harga" class="col-sm-3 col-form-label">Harga</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" id="harga" name="harga">
							</div>
						</div>	
						<div class="form-group row">
							<label for="warna1" class="col-sm-3 col-form-label">Warna 1</label>
							<div class="col-sm-9">
								<select class="form-control" name="warna1">
									<option class="disabled">Pilih Warna</option>
									<option>Merah</option>
									<option>Kuning</option>
									<option>Hijau</option>
								</select>
							</div>
						</div>								
						<div class="form-group row">
							<label for="warna2" class="col-sm-3 col-form-label">Warna 2</label>
							<div class="col-sm-9">
								<select class="form-control" name="warna2">
									<option class="disabled">Pilih Warna</option>
									<option>Merah</option>
									<option>Kuning</option>
									<option>Hijau</option>
								</select>
							</div>
						</div>								
						<div class="form-group row">
							<label for="warna3" class="col-sm-3 col-form-label">Warna 3</label>
							<div class="col-sm-9">
								<select class="form-control" name="warna3">
									<option class="disabled">Pilih Warna</option>
									<option>Merah</option>
									<option>Kuning</option>
									<option>Hijau</option>
								</select>
							</div>
						</div>								
						<div class="form-group row">
							<label for="penggunaan" class="col-sm-3 col-form-label">Penggunaan</label>
							<div class="col-sm-9">
								<select class="form-control" name="penggunaan">
									<option class="disabled">Pilih</option>
									<option>Baru</option>
									<option>Bekas</option>
								</select>
							</div>
						</div>								
						<div class="form-group row">
							<label for="keterangan" class="col-sm-3 col-form-label">Kondisi</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="keterangan" name="keterangan">
							</div>
						</div>								
						<div class="col-md-12" style="padding-top: 7px;">
							<button type="submit" class="btn" style="width: 100%;">Tambah</button>
						</div>					
					</form>		
				</div>
			</div>		
		</div>
	</div>

</main>

@endsection