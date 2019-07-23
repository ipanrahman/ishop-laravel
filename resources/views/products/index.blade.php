@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="padding-y-sm">
            <span>{{ $products->count() }} results for "Item"</span>
        </div>
        <div class="row-sm">
            @foreach($products as $product)
                <div class="col-md-3 col-sm-6">
                    <figure class="card card-product">
                        <div class="img-wrap">
                            <img src="{{ asset('/images/'. $product->images()->first()->image_src) }}">
                        </div>
                        <figcaption class="info-wrap">
                            <a href="{{ route('products.show',$product->id) }}" class="title">{{ $product->name }}</a>
                            <div class="price-wrap">
                                <span class="price-new">{{ $product->price }}</span>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
@endsection
