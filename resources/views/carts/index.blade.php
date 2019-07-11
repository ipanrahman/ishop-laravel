@extends('layouts.frontend')
@section('content')
    <section class="section-content bg padding-y border-top">
        <div class="container">

            <div class="row">
                <main class="col-sm-9">
                    <div class="card">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                <th scope="col" class="text-right" width="200">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart->products as $product)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                <img
                                                    src="{{ asset('/images/'. $product->images()->first()->image_src) }}"
                                                    class="img-thumbnail img-sm"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">{{ $product->name }}</h6>
                                                <dl class="dlist-inline small">
                                                    <dt>Size:</dt>
                                                    <dd>XXL</dd>
                                                </dl>
                                                <dl class="dlist-inline small">
                                                    <dt>Color:</dt>
                                                    <dd>Orange color</dd>
                                                </dl>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            @for($i=1;$i<=$product->stock;$i++)
                                                <option name="quantity" id="quantity"
                                                @if($cart->quantity ==$i) {{ "selected" }}
                                                    @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">Rp{{ $product->price }}</var>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-outline-warning btn-round"
                                                id="btnUpdateCart" data-id="{{ $cart->id }}">Update
                                        </button>
                                        <button href="" class="btn btn-outline-danger btn-round"
                                                id="btnRemoveCart" data-id="{{ $cart->id }}">Remove
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
                <div class="col-sm-3">
                    <div class="card">
                        <table class="table table-hover shopping-cart-wrap">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col">Ringkasan Belanja</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Total Harga <b>Rp{{ $cart->quantity *$cart->products->sum('price') }}</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary bnt-lg">Beli</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('#btnUpdateCart').click(function (evt) {
                evt.preventDefault();
                const id = $(this).data('id');
                $.ajax({
                    url: '/carts/' + id,
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: $('#quantity').val()
                    },
                    success: function (res) {
                        Swal.fire({
                            title: 'Info!',
                            text: res.success,
                            type: 'info',
                            showConfirmButton: false,
                        });
                        setTimeout(function () {
                            window.location = '{{ route('carts.index') }}';
                        }, 1000);
                    }
                });
            });
            $('#btnRemoveCart').click(function (evt) {
                evt.preventDefault();
                const id = $(this).data('id');
                $.ajax({
                    url: '/carts/' + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: $('#quantity').val()
                    },
                    success: function (res) {
                        Swal.fire({
                            title: 'Info!',
                            text: res.success,
                            type: 'info',
                            showConfirmButton: false,
                        });
                        setTimeout(function () {
                            window.location = '{{ route('carts.index') }}';
                        }, 1000);
                    }
                });
            });
        });
    </script>
@endpush
