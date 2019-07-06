@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<br>
			<h2>List Order</h2>
			@if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif
			@if(count($errors))
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					  <li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div>
				<a href="{{ route('admin.orders.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Order</a>
			</div>
			<br>
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead class="thead-dark">
						<tr>
							<th>No.</th>
							<th>Harga Total</th>
							<th>Status</th>
							<th>Kode Pos</th>
							<th>Alamat Pengiriman</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td>{{ $order['id'] }}</td>
							<td>Rp. {{ $order['total_price'] }}</td>
							<td>{{ $order['status'] }}</td>
							<td>{{ $order['zip'] }}</td>
							<td>{{ $order['address'] }}</td>
							<td>
								<a class="btn btn-success btn-sm" href="{{ route('admin.orders.show' , $order->id) }}"><i class="far fa-eye"></i> Detail</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection