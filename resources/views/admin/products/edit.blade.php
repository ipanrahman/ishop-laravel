@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h2>Edit Produk</h2>
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

			<form action="{{ route('admin.products.update',$products->id) }}" enctype="multipart/form-data" method="POST">
				{{ csrf_field() }}
				 @method('PATCH')
				<div class="from-group">
					<label>Nama Produk</label>
					<input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ $products->name }}">
				</div>
				<br>
				<div class="from-group">
					<label>Harga</label>
					<input type="number" name="price" class="form-control" placeholder="Harga" value="{{ $products->price }}">
				</div>
				<br>
				<div class="from-group">
					<label>Stook</label>
					<input type="number" name="stock" class="form-control" placeholder="Harga">
				</div>
				<br>
				<div class="from-group">
					<label>Deskripsi</label>
					<textarea name="description" id="ckview">{{ $products->description }} </textarea>
					<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
					<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
					<script>tinymce.init({ selector:'#ckview' });</script>
				</div>
				<br>
				<div class="from-group mt-4">
					<label for="category">Category</label>
					<select name="category" class="form-control">
						<option hidden value="{{$products->category()->first()->id}}">{{$products->category()->first()->name}}</option>
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
					</select>					
				</div>
				
				<br>
				<div class="form-group">
				@foreach($products->images()->get() as $i)
					<img src="{{url('images/', $i->image_src)}}" style="width:100px;height:100px;">
				@endforeach
				<br>
                                <label for="images">Images</label>
                                <input type="file" class="form-control-file" name="images[]" id="images" multiple>
								kosongkan jika tidak ingin merubah foto
                </div>
				<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
				<a href="{{ route('admin.products.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Back</a>
			</form>
		</div>
	</div>
</div>
@endsection