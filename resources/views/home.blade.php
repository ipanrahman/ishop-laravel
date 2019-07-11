@extends('layouts.frontend')
@section('content')
    <section class="section-main bg padding-y-sm">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm">
                        <aside class="col-md-3">
                            <h5 class="text-uppercase">My Markets</h5>
                            <ul class="menu-category">
                                @foreach($categories as $category)
                                    <li><a href="#">{{ $category->name }}</a></li>
                                    @break($loop->index==5)
                                @endforeach
                                <li class="has-submenu"><a href="#">More category <i
                                            class="icon-arrow-right pull-right"></i></a>
                                    <ul class="submenu">
                                        @foreach($categories as $category)
                                            @if($loop->index>5)
                                                <li><a href="#">{{ $category->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </aside>
                        <div class="col-md-9">

                            <div class="owl-init slider-main owl-carousel" data-items="1" data-nav="true"
                                 data-dots="false">
                                <div class="item-slide">
                                    <img src="{{ asset('images/banners/slide1.jpg') }}" alt="Slide 1">
                                </div>
                                <div class="item-slide">
                                    <img src="{{ asset('images/banners/slide2.jpg') }}" alt="Slide 2">
                                </div>
                                <div class="item-slide">
                                    <img src="{{ asset('images/banners/slide3.jpg') }}" alt="Slide 3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="section-request bg padding-y-sm">
        <div class="container">
            <header class="section-heading heading-line">
                <h4 class="title-section bg text-uppercase">Recommended items</h4>
            </header>

            <div class="row-sm">
                @foreach($products as $product)
                    <div class="col-md-2">
                        <figure class="card card-product">
                            <div class="img-wrap">
                                <img src="{{ asset('/images/'. $product->images()->first()->image_src) }}" alt="">
                            </div>
                            <figcaption class="info-wrap">
                                <h6 class="title ">
                                    <a href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a>
                                </h6>

                                <div class="price-wrap">
                                    <span class="price-new">Rp{{ $product->price }}</span>
                                </div>
                                <form method="post" action="{{ route('carts.store') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </form>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
