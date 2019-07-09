@extends('layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Product</div>
                <div class="card-body">
                    <div style="margin-bottom: 10px">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Created Date</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody class="tbody-light">
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product['id'] }}</td>
                                    <td>{{ $product['name'] }}</td>
                                    <td>Rp. {{ number_format($product->price,2) }}</td>
                                    <td>{{ $product['created_at'] }}</td>
                                    <td style="width: 5%">
                                        <a class="btn btn-warning"
                                           href="{{ route('admin.products.edit',$product->id) }}"><i
                                                class="fas fa-sync"></i> Edit</a>
                                    </td>
                                    <td style="width: 5%">
                                        <a class="btn btn-success"
                                           href="{{ route('admin.products.show',$product->id) }}">
                                            <i class="far fa-eye"></i> Detail
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.products.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')"
                                                    type="submit">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
