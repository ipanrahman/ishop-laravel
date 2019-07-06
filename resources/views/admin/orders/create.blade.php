@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h2>Alamat Pengiriman</h2>

			<br>
			@if(count($errors))
			<div class="form-group">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<br>

			<form action="{{ route('admin.orders.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="">Nama</label>
					<input type="text" class="form-control" name="name">
				</div>
				<div class="form-group">
					<label for="">No. Telepon</label>
					<input type="text" class="form-control" name="telp">
				</div>
				<div class="form-group">
					<label>Alamat Pengiriman</label>
					<textarea name="address" class="form-control" rows="3" placeholder="Alamat Pengiriman"></textarea>
				</div>
				<div class="form-group row">
					<div class="col">
						<label for="">Kecamatan</label>
						<input type="text" class="form-control" name="kec">
					</div>
					<div class="col">
						<label for="">Kota / Kab</label>
						<input type="text" class="form-control" name="city">
					</div>
					<div class="col">
						<label for="">Provinsi</label>
						<input type="text" class="form-control" name="province">
					</div>
				</div>
				<div class="form-group">
					<label>Kode Pos</label>
					<input type="number" name="zip" class="form-control" placeholder="Kode Pos">
				</div>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
			</form>
		</div>
	</div>
</div>
@endsection