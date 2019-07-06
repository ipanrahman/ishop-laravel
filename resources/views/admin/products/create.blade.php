@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h2><i class="fa fa-plus-square"></i> Product</h2>
			<br />
			@if(count($errors))
			<div class="from-group">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						  <li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<br />

			<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="from-group">
					<label>Nama Produk</label>
					<input type="text" name="name" class="form-control" placeholder="Nama Produk">
				</div>
				<br>
				<div class="from-group">
					<label>Harga</label>
					<input type="number" name="price" class="form-control" placeholder="Harga">
				</div>
				<div class="from-group">
					<label>Stok</label>
					<input type="number" name="stock" class="form-control" placeholder="Stok">
				</div>
				<br>
				<div class="from-group">
					<label>Deskripsi</label>
					<textarea name="description" id="ckview"> </textarea>
					<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
					<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
					<script>tinymce.init({ selector:'#ckview' });</script>
				</div>
				<div class="from-group mt-4">
					<label for="category">Category</label>
					<select name="category" class="form-control">
					<option hidden>Choose Category..</option>
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
					</select>					
				</div>
				<br>
				 <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control-file" name="images[]" multiple>
	             </div>
				<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
				<a href="{{ route('admin.products.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Back</a>
			</form>
		</div>
	</div>
</div>
@endsection