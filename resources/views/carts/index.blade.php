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
                            @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap">
                                                <img
                                                    src="{{ asset('/images/'. $cart->product_image_url) }}"
                                                    class="img-thumbnail img-sm">
                                            </div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">{{ $cart->products_name }}</h6>
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
                                        <input type="text" name="quantity" value="{{ $cart->quantity }}" id="quantity"
                                               class="form-control">
                                    </td>
                                    <td>
                                        <div class="price-wrap">
                                            <var class="price">Rp{{ $cart->product_price }}</var>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-outline-warning btn-round"
                                                id="btnUpdateCart" data-id="{{ $cart->id }}"
                                                onclick="updateCart('{{ $cart->id }}')">Update
                                        </button>
                                        <button href="" class="btn btn-outline-danger btn-round"
                                                id="btnRemoveCart" data-id="{{ $cart->id }}"
                                                onclick="removeCart('{{ $cart->id }}')">Remove
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
                                <td>Total Harga <b>Rp{{ $carts->sum('total')}}</b></td>
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
        function updateCart(id) {
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
                },
                error: function (res) {
                    console.log(res);
                }
            });
        }

        function removeCart(id) {
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
        }
    </script>
@endpush
