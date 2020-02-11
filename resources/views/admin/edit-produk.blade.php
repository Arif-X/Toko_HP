@extends('layouts.admin.admin-produk')

@section('content')

<main role="main">	

	<div id="editproduk" class="container-fluid">

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
				<li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
			</ol>
		</nav>
		
		<div class="col-md-9" style="margin-left: auto; margin-right: auto;">
			<div class="card">
				<div class="card-header">
					Edit Produk
				</div>
				<div class="card-body">
					@foreach($data as $p)
					<form method="POST" action="/admin/produk/edit/edit-gambar-produk" enctype="multipart/form-data">
						@csrf
						<input type="number" class="form-control" id="id" name="id" value="{{  $p->id }}" hidden>
						<div class="form-group row">							
							<label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-9">
										<input type="file" class="form-control" id="gambar" name="gambar">
									</div>
									<div class="col-sm-3">
										<button type="submit" class="btn" style="width: 100%;">Edit Gambar</button>
									</div>
								</div>																
							</div>
						</div>
					</form>	
					@endforeach		
					@foreach($data as $p)
					<form method="POST" action="/admin/produk/edit/edit-produk">
						@csrf
						<input type="number" class="form-control" id="id" name="id" value="{{  $p->id }}" hidden>
						<div class="form-group row">
							<label for="merek" class="col-sm-3 col-form-label">Merek</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="merek" name="merek" value="{{  $p->merek }}">
							</div>
						</div>	
						<div class="form-group row">
							<label for="tipe" class="col-sm-3 col-form-label">Tipe Produk</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="tipe" name="tipe" value="{{  $p->tipe }}">
							</div>
						</div>						
						<div class="form-group row">
							<label for="harga" class="col-sm-3 col-form-label">Harga</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" id="harga" name="harga" value="{{  $p->harga }}">
							</div>
						</div>	
						<div class="form-group row">
							<label for="warna1" class="col-sm-3 col-form-label">Warna 1</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="warna1" name="warna1" value="{{  $p->warna1 }}">
							</div>
						</div>								
						<div class="form-group row">
							<label for="warna2" class="col-sm-3 col-form-label">Warna 2</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="warna2" name="warna2" value="{{  $p->warna2 }}">
							</div>
						</div>								
						<div class="form-group row">
							<label for="warna3" class="col-sm-3 col-form-label">Warna 3</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="warna3" name="warna3" value="{{  $p->warna3 }}">
							</div>
						</div>								
						<div class="form-group row">
							<label for="penggunaan" class="col-sm-3 col-form-label">Penggunaan</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="penggunaan" name="penggunaan" value="{{  $p->penggunaan }}">
							</div>
						</div>								
						<div class="form-group row">
							<label for="keterangan" class="col-sm-3 col-form-label">Kondisi</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="keterangan" name="keterangan" value="{{  $p->keterangan }}">
							</div>
						</div>								
						<div class="col-md-12" style="padding-top: 7px;">
							<button type="submit" class="btn" style="width: 100%;">Edit</button>
						</div>					
					</form>
					@endforeach					
				</div>
			</div>		
		</div>
	</div>
	
</main>

@endsection