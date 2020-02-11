@extends('layouts.user-layout')

@section('content')

<main role="main">	

	<div id="user">

		@if ($message = Session::get('info'))
		<div class="alert alert-info alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>    
			<strong>{{ $message }}</strong>
		</div>
		@endif

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">User</li>
			</ol>
		</nav>

		<div class="row">

			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						<strong>Foto</strong>
					</div>
					<div class="card-body">
						<form method="POST" action="/user/foto/update" enctype="multipart/form-data">
							@csrf
							<div class="col-md-12">
								<img src="{{ asset('storage/foto/'.Auth::user()->foto) }}" class="img-fluid mx-auto d-block border-radius-10px" alt="img1" name="asli">
								<br>
								<input type="file" class="form-control" id="foto" name="foto">
								<div class="col-md-12" style="padding-top: 7px;">
									<button type="submit" class="btn" style="width: 100%;">Edit</button>
								</div>
							</div>                     
							<br>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">
					<form method="POST" action="/user/data/update">
						@csrf
						<div class="card-header">
							<strong>Personal Info</strong>
						</div>						
						<div class="card-body">
							<div class="form-group row">
								<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->name }}">
								</div>
							</div>								
							<div class="form-group row">
								<label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="alamat" name="alamat" value="{{ Auth::user()->alamat }}">
								</div>
							</div>
							<div class="form-group row">
								<label for="no_rek" class="col-sm-3 col-form-label">Email/No. Rek.</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="no_rek" name="no_rek" value="{{ Auth::user()->no_rek }}">
								</div>
							</div>
							<div class="form-group row">
								<label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="kode_pos" name="kode_pos" value="{{ Auth::user()->kode_pos }}">
								</div>
							</div>
							<div class="form-group row">
								<label for="no_telp" class="col-sm-3 col-form-label">No. Telp.</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="no_telp" name="no_telp" value="{{ Auth::user()->no_hp }}">
								</div>
							</div>
							<div class="col-md-12" style="padding-top: 7px;">
								<button type="submit" class="btn" style="width: 100%;">Edit</button>
							</div>
						</div>						
					</form>		
				</div>			
			</div>
		</div>

	</div>

</main>

@endsection