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
<div class="container">
	<div class="row">
		<div class="col-md-3">
            <img src="{{ asset('/images/'. $products->images()->first()->image_src) }}" class="img-thumbnail img-fluid"  style="width:200px;height:200px;">
		</div>

		<div class="col-md-9">
			<h3>{{ $products -> name }}</h3>
			
			<h4>Rp. {{ $products -> price }}</h4>
			@if(Auth::check())
				<div class="mt-4">
					<a href="{{ route('carts.add',$products->id) }}" class="btn btn-outline-primary"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
				</div>
			@endif

			<br>
			
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
						<a class="nav-link" href="#review" role="tab" data-toggle="tab">Review {{$products->review()->count()}} </a>
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
						<button class="btn mb-4 	btn-outline-primary" data-toggle="modal" data-target="#addReview">+ Add Review</button>
						
							<div class="modal fade" id="addReview" role="">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
									<div class="modal-header">
										<h5>Review</h5>
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
										<div class='modal-body'>
										<form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<input type="hidden" value="{{$products->id}}" name="idproduct">
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
												<textarea name="description" id="ckview" row="40"> </textarea>
												<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
												<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
												<script>tinymce.init({ selector:'#ckview' });</script>
											</div>
											<br>
										
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
										</form>

										<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>										</div>
									</div>
								</div>
							</div>
							<br>
							@foreach($products->review as $pr)
									
							<div class="card">
								<div class="card-body">
									<div class="row">	
										<div class="col">
										<strong>{{$pr->user->name}}</strong>
										<br>
										{!!$pr->description!!}
									
										</div>
										<div class="col">
										@if($pr->rating == 5)
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											@elseif($pr->rating == 4)
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star"></i>
											@elseif($pr->rating ==3)
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star "></i>
											<i class="fa fa-star "></i>
											@elseif($pr->rating == 2)
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star "></i>
											<i class="fa fa-star "></i>
											<i class="fa fa-star "></i>
											@elseif($pr->rating == 1)
											<i class="fa fa-star text-warning"></i>
											<i class="fa fa-star "></i>
											<i class="fa fa-star "></i>
											<i class="fa fa-star "></i>
											<i class="fa fa-star "></i>
										@endif

										</div>
									</div>
								</div>
							</div>
							@endforeach
						@else
						Login untuk menulis Review
						<br>

						@endif
						
						
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection