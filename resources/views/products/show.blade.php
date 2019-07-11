@extends('layouts.frontend')
@section('content')
    <section class="section-content bg padding-y-sm">
        <div class="container">
            <nav class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Category name</a></li>
                    <li class="breadcrumb-item"><a href="#">Sub category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Items</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-xl-12 col-md-9 col-sm-12">


                    <main class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-6 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <div>
                                            <a href="{{ asset('/images/'. $product->images()->first()->image_src) }}"
                                               data-fancybox="">
                                                <img
                                                    src="{{ asset('/images/'. $product->images()->first()->image_src) }}">
                                            </a>
                                        </div>
                                    </div> <!-- slider-product.// -->
                                    <div class="img-small-wrap">
                                        @foreach($product->images()->get() as $image)
                                            <div class="item-gallery">
                                                <img src="{{ asset('/images/'. $image->image_src) }}">
                                            </div>
                                        @endforeach
                                    </div> <!-- slider-nav.// -->
                                </article> <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-6">
                                <article class="card-body">
                                    <h3 class="title mb-3">{{ $product->name }}</h3>
                                    <div class="mb-3">
                                        <var class="price h3 text-warning">
                                            <span class="currency">Rp</span>
                                            <span class="num">{{ $product->price }}</span>
                                        </var>
                                    </div>
                                    <dl>
                                        <dt>Description</dt>
                                        <dd>
                                            <p>{!! $product->description !!}
                                            </p>
                                        </dd>
                                    </dl>
                                    <div class="rating-wrap">

                                        <ul class="rating-stars">
                                            <li style="width:80%" class="stars-active">
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <div class="label-rating">132 reviews</div>
                                        <div class="label-rating">154 orders</div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <dl class="dlist-inline">
                                                <dt>Quantity:</dt>
                                                <dd>
                                                    <select class="form-control form-control-sm" style="width:70px;">
                                                        <option> 1</option>
                                                        <option> 2</option>
                                                        <option> 3</option>
                                                    </select>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <hr>
                                    <a href="#" class="btn btn-outline-warning">Order</a>
                                </article>
                            </aside>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </section>
@endsection
