<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- custom style -->
    <link href="{{ asset('css/frontend-style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/frontend-responsive.css') }}" rel="stylesheet"
          media="only screen and (max-width: 1200px)"/>
</head>
<body>
<header class="section-header">
    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row-sm align-items-center">
                <div class="col-lg-4-24 col-sm-3">
                    <div class="category-wrap dropdown py-1">
                        <button type="button" class="btn btn-light  dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-bars"></i> Categories
                        </button>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="#">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="#" class="py-1">
                        <div class="input-group w-100">
                            <select class="custom-select" name="category_name">
                                <option value="">All type</option>
                                <option value="">Special</option>
                                <option value="">Only best</option>
                                <option value="">Latest</option>
                            </select>
                            <input type="text" class="form-control" style="width:50%;" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9-24 col-sm-12">
                    <div class="widgets-wrap float-right row no-gutters py-1">
                        <div class="col-auto">
                            <a href="#" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-warning icon-sm  fa fa-heart"></i></div>
                                    <div class="text-wrap text-dark">
                                        <span class="small round badge badge-secondary">0</span>
                                        <div>Cart</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <div class="widget-header">
                                <a href="#" data-offset="20,10">
                                    <div class="icontext">
                                        <div class="icon-wrap"><i class="text-warning icon-sm fa fa-user"></i></div>
                                        <div class="text-wrap text-dark">
                                            Sign in
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>
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

                        <div class="owl-init slider-main owl-carousel" data-items="1" data-nav="true" data-dots="false">
                            <div class="item-slide">
                                <img src="images/banners/slide1.jpg">
                            </div>
                            <div class="item-slide">
                                <img src="images/banners/slide2.jpg">
                            </div>
                            <div class="item-slide">
                                <img src="images/banners/slide3.jpg">
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
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">Good item name</a></h6>

                        <div class="price-wrap">
                            <span class="price-new">$1280</span>
                            <del class="price-old">$1980</del>
                        </div>

                    </figcaption>
                </figure>
            </div>
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/4.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">The name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/5.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">Name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/6.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">The name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">Good item name</a></h6>

                        <div class="price-wrap">
                            <span class="price-new">$1280</span>
                            <del class="price-old">$1980</del>
                        </div>

                    </figcaption>
                </figure>
            </div>
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/4.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">The name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/5.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">Name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/6.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">The name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/3.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">Good item name</a></h6>

                        <div class="price-wrap">
                            <span class="price-new">$1280</span>
                            <del class="price-old">$1980</del>
                        </div> <!-- price-wrap.// -->

                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/4.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">The name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/5.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">Name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="images/items/6.jpg"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title "><a href="#">The name of product</a></h6>
                        <div class="price-wrap">
                            <span class="price-new">$280</span>
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </figure> <!-- card // -->
            </div> <!-- col // -->
        </div> <!-- row.// -->


    </div><!-- container // -->
</section>
<!-- ========================= SECTION ITEMS .END// ========================= -->

<!-- ========================= SECTION SUBSCRIBE ========================= -->
<section class="section-subscribe bg-secondary padding-y-lg">
    <div class="container">

        <p class="pb-2 text-center white">Delivering the latest product trends and industry news straight to your
            inbox</p>

        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-sm-6">
                <form class="row-sm form-noborder">
                    <div class="col-8">
                        <input class="form-control" placeholder="Your Email" type="email">
                    </div> <!-- col.// -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-block btn-warning"><i class="fa fa-envelope"></i> Subscribe
                        </button>
                    </div> <!-- col.// -->
                </form>
                <small class="form-text text-white-50">We’ll never share your email address with a third-party.</small>
            </div> <!-- col-md-6.// -->
        </div>


    </div>
</section>
<footer class="section-footer bg-secondary">
    <div class="container">
        <section class="footer-bottom row border-top-white">
            <div class="col-sm-6">
                <p class="text-md-right text-white-50">
                    Copyright &copy
                    <a href="{{ config('app.url') }}" class="text-white-50">ishop.co.id</a>
                </p>
            </div>
        </section>
    </div>
</footer>
</body>
<script src="{{ asset('js/app.js') }}" rel="stylesheet"></script>
<link href="{{ asset('plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
<script src={{ asset('plugins/owlcarousel/owl.carousel.min.js') }}></script>

<script src={{ asset('js/frontend.js') }}></script>
</html>
