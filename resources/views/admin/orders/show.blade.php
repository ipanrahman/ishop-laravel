@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			@if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif
			<br>
			<h2>List Order</h2>
			<br>
			<div class="table-responsive">
				<table class="table table-hover h5">
					
					<tr>
						<td width="20%">Status</td>
						<td width="2%">:</td>
						<td>{{ $order->status }}</td>
					</tr>
					<tr>
						<td width="20%">name</td>
						<td width="2%">:</td>
						<td>{{ $order->name }}</td>
					</tr>
					<tr>
						<td width="20%">telp</td>
						<td width="2%">:</td>
						<td>{{ $order->telp }}</td>
					</tr>
					<tr>
						<td width="20%">Alamat Pengiriman</td>
						<td width="2%">:</td>
						<td>{{ $order->address }}</td>
					</tr>
					<tr>
						<td>Kode Pos</td>
						<td>:</td>
						<td>{{ $order->zip }}</td>
					</tr>
					<tr>
						<td>Harga Total</td>
						<td>:</td>
						<td>Rp. {{ $order->total_price }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<br>
	<div class="row justify-content-center">
		<div class="col">
			<table id="cart" class="table table-hover table-condensed">
				<thead class="thead-dark">
					<tr>
						<th style="width:50%">Product</th>
						<th style="width:10%">Price</th>
						<th style="width:8%">Quantity</th>
						<th style="width:22%" class="text-center">Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach($order->orderItems as $orderItem)
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-3 hidden-xs">
									<img style="width:100px; height:100px"  src="{{ asset('/images/'. $orderItem->product->images->first()->image_src) }}">
								</div>
								<div class="col-sm-9">
									<a href="{{ url('show',$orderItem->product->id) }}"><h4 class="nomargin">{{ $orderItem->product->name }}</h4></a>
								</div>
							</div>
						</td>
						<td data-th="Price">
							Rp. {{ $orderItem->price }}
						</td>
						<td data-th="Quantity">
							{{ $orderItem->quantity }}
						</td>
						<td data-th="Subtotal" class="text-center">
							Rp. {{ $orderItem->price * $orderItem->quantity }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<br>
	<div>
		<a href="{{ route('admin.orders.index') }}" class="btn btn-primary"><i class="fas fa-undo"></i> Back</a>
	</div>	
</div>
@endsection