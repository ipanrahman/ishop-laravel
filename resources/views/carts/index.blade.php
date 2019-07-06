@extends('layouts.app')

@section('content')
<div class="container">
	<br>
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<table id="cart" class="table table-hover table-condensed">
		<thead class="thead-light">
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		<tbody>
			
			<?php $total = 0 ?>

			@if(session('cart'))
			@foreach(session('cart') as $id => $product)

			<?php $total += $product['price'] * $product['quantity'] ?>

			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-3 hidden-xs">
					      <img src="{{ asset('/images/'. $product['image_url']) }}" style="width:100px;height:100px;">
						</div>
						<div class="col-sm-9">
							<h4 class="nomargin">{{ $product['name'] }}</h4>
						</div>
					</div>
				</td>
				<td data-th="Price">Rp. {{ $product['price'] }}</td>
				<td data-th="Quantity">
					<input type="number" value="{{ $product['quantity'] }}" class="form-control quantity" min="1" max="{{$product['stock']}}">
				</td>
				<td data-th="Subtotal" class="text-center">Rp. {{ $product['price'] * $product['quantity'] }}</td>
				<td class="actions" data-th="">
					<button class="btn btn-primary btn-sm update-cart" data-id="{{ $id }}"><i class="fas fa-sync"></i> Update</button>
					<button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fas fa-trash-alt"></i> Remove</button>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<td>
					<a href="{{ url('public') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Lanjutkan Belanja</a>
					
				</td>
				<td colspan="2" class="text-left h4"><b>TOTAL</b></td>
				<td colspan="" class="text-center h4"><b>Rp. {{ $total }}</b></td>
				<td colspan="" class="text-center h4"><a href="{{ route('admin.orders.create') }}" class="btn btn-success"><i class="fas fa-money-bill-wave"></i> Lanjutkan ke Pembayaran</a></td>				
			</tr>
			
		</tfoot>
	</table>
</div>
@endsection