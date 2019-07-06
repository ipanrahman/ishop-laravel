@extends('layouts.app')

@section('content')
<style type="text/css">
	.star-rating {
		font-size: 0;
		white-space: nowrap;
		display: inline-block;
		/* width: 250px; remove this */
		height: 50px;
		overflow: hidden;
		position: relative;
		background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
		background-size: contain;
	}

	.star-rating i {
		opacity: 0;
		position: absolute;
		left: 0;
		top: 0;
		height: 100%;
		/* width: 20%; remove this */
		z-index: 1;
		background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
		background-size: contain;
	}

	.star-rating input {
		-moz-appearance: none;
		-webkit-appearance: none;
		opacity: 0;
		display: inline-block;
		/* width: 20%; remove this */
		height: 100%;
		margin: 0;
		padding: 0;
		z-index: 2;
		position: relative;
	}

	.star-rating input:hover + i,
	.star-rating input:checked + i {
		opacity: 1;
	}

	.star-rating i ~ i {
		width: 40%;
	}
	.star-rating i ~ i ~ i {
		width: 60%;
	}
	.star-rating i ~ i ~ i ~ i {
		width: 80%;
	}
	.star-rating i ~ i ~ i ~ i ~ i {
		width: 100%;
	}

	::after,
	::before {
		height: 100%;
		padding: 0;
		margin: 0;
		box-sizing: border-box;
		text-align: center;
		vertical-align: middle;
	}

	.star-rating.star-5 {width: 250px;}
	.star-rating.star-5 input,
	.star-rating.star-5 i {width: 20%;}
	.star-rating.star-5 i ~ i {width: 40%;}
	.star-rating.star-5 i ~ i ~ i {width: 60%;}
	.star-rating.star-5 i ~ i ~ i ~ i {width: 80%;}
	.star-rating.star-5 i ~ i ~ i ~ i ~i {width: 100%;}

	.star-rating.star-3 {width: 150px;}
	.star-rating.star-3 input,
	.star-rating.star-3 i {width: 33.33%;}
	.star-rating.star-3 i ~ i {width: 66.66%;}
	.star-rating.star-3 i ~ i ~ i {width: 100%;}
</style>
<!-- <div class="container col-md-8">
	<div class="row justify-content-center">
		<div class="col">
			<h2>Detail Produk</h2>
			<br />
			<div class="table-responsive">
				<table class="table table-hover h5">
					<tr>
						<td>No</td>
						<td>:</td>
						<td>{{ $products['id'] }}</td>
					</tr>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td>{{ $products['name'] }}</td>
					</tr>
					<tr>
						<td>Price</td>
						<td>:</td>
						<td>{{ $products['price'] }}</td>
					</tr>
					<tr>
						<td>Description</td>
						<td>:</td>
						<td>{{ $products['description'] }}</td>
					</tr>
					<tr>
						<td>Created_At</td>
						<td>:</td>
						<td>{{ $products['created_at'] }}</td>
					</tr>
					<tr>
						<td>Images</td>	
						<td>:</td>
						@if(!$products->images()->get()->isEmpty())
						<td>
							 @foreach($products->images()->get() as $image)
                            <image src="{{ asset('/images/'.$image->image_src) }}" class="img-thumbnail img-fluid" alt="{{ $image->image_desc }}" style="width:200px;height:200px;"></image>
                        @endforeach
						</td>
                        @endif
					</tr>					
				</table>
				<div>
					<a href="{{ url('public') }}" class="btn btn-primary">Back</a>
				</div>			
			</div>		
		</div>
	</div>
</div> -->

<div class="container">
	<div class="row">
		<div class="col-md-3">
		@if(!$products->images()->get()->isEmpty())
			 @foreach($products->images()->get() as $idx2 => $image)
			 	@if($idx2 == 0)
            	<image src="{{ asset('/images/'.$image->image_src) }}" class="img-thumbnail img-fluid" alt="{{ $image->image_desc }}" style="width:200px;height:200px;"></image>
            	@endif
        	@endforeach
        @endif
		</div>

		<div class="col-md-9">
			<h3>{{ $products -> name }}</h3>
			<h4>Rp. {{ $products -> price }}</h4>
			@if(Auth::check())
				<div class="mt-4">
					<a href="{{ route('carts.add',$products->id) }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>
			@endif

			<br>
			<?php
				$total = 0;
				$jumlah = 0;
				$avg = 0;

				foreach($reviews as $id => $review)
				{
					$total += $review->rating;
				}

				$jumlah = count($reviews->all());
				
				// echo $total."total bintang";
				// echo $jumlah."jumlah data";
				// echo "rata-rata = ".$avg;

				$star = 1; 
				if($jumlah<>0)
				{
					$avg = $total / $jumlah;
					while($star <= 5)
					{
						while($star <= $avg)
						{
							echo '<i class="fas fa-star fa-2x" style="color:orange"></i>';
							$star++;
						}
						
						while($star <= 5)
						{
							echo '<i class="far fa-star fa-2x" style="color:orange"></i>';
							$star++;
						}
					}
				}

				else
				{
					while($star <= 5)
					{
						echo '<i class="far fa-star fa-2x" style="color:orange"></i>';
						$star++;
					}
				}
			?>
			
			<div class="mt-4">
				<a href="https://www.facebook.com/sharer/sharer.php?u={{ url('show', $products->id) }}" class="social-button" target="_blank">
					Share Facebook
				</a>|
				<a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ url('show', $products->id) }}" class="social-button" target="_blank">
					Share Twitter
				</a>|
				<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('show', $products->id) }}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button" target="_blank">
					Share Linkedin
				</a>|
				<a href="http://wa.me/?text={{ url('show', $products->id) }}" class="social-button" target="_blank">
					Share WhatsApp
				</a>
			</div>

			<div class="mt-4">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" href="#description" role="tab" data-toggle="tab">Deskripsi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
					</li>
				</ul>

				<div class="tab-content mt-2">
					<div class="tab-pane fade in active show" role="tabpanel" id="description">
						{!! $products -> description !!}
					</div>
					<div class="tab-pane fade" role="tabpanel" id="review">
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

						@if($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
						@endif

						@if(Auth::check())
						<form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" value="{{ $products->id }}" name="product_id">
							<input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
							<label>Rating</label>
							<br>
							<span class="star-rating star-5">
								<input type="radio" name="rating" value="1"><i></i>
								<input type="radio" name="rating" value="2"><i></i>
								<input type="radio" name="rating" value="3"><i></i>
								<input type="radio" name="rating" value="4"><i></i>
								<input type="radio" name="rating" value="5"><i></i>
							</span>	
							<br>
							<div class="from-group mt-2">
								<label>Deskripsi</label>
								<textarea name="description" id="ckview"> </textarea>
								<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
								<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
								<script>tinymce.init({ selector:'#ckview' });</script>
							</div>
							<br>
							<button type="submit" class="btn btn-primary"><i class="fas fa-comment-dots"></i> Compose</button>
						</form>
						@else
						Login untuk menulis Review
						<br>
						@endif

						<br>
						@if(count($reviews->all()))
							<h4>{{ count($reviews->all()) }} Review</h4>
						@else
							<h4>Tidak Ada Review</h4>
						@endif
						<br>
						@foreach($reviews as $id => $review)
						<div class="card mb-2">
							<div class="row">
								<div class="col-md-2">
									<img src="{{ asset('/images/user.png') }}" class="ml-3 mt-3 mb-3 card-img" alt="user">
								</div>
								<div class="col-md-10">
									<div class="card-body">
										<h5 class="card-title" style="color:#3490dc;font-weight:bold">{{ $review->user->name }}</h4>
										<p class="card-text">{!! $review->description !!}</p>
										<?php 
											$star = 1; 
											while($star <= 5)
											{
												while($star <= $review->rating)
												{
													echo '<i class="fas fa-star" style="color:orange"></i>';
													$star++;
												}
												
												while($star <= 5)
												{
													echo '<i class="far fa-star" style="color:orange"></i>';
													$star++;
												}
											}
										?>
										<p class="card-text"><small class="text-muted">{{ $review->updated_at->diffForHumans() }}</small></p>
									</div>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection