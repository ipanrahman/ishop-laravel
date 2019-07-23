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

    <link href="{{ asset('plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/css/sweetalert2.css') }}">
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
                    <form action="{{ route('products.search') }}" class="py-1" method="get">
                        <div class="input-group w-100">
                            <select class="custom-select" name="q_name">
                                <option value="">All type</option>
                                <option value="">Special</option>
                                <option value="">Only best</option>
                                <option value="">Latest</option>
                            </select>
                            <input type="text" class="form-control" style="width:50%;" placeholder="Search" name="q">
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
                            <a href="{{ route('carts.index') }}" class="widget-header">
                                <div class="icontext">
                                    <div class="icon-wrap"><i class="text-warning icon-sm  fa fa-heart"></i></div>
                                    <div class="text-wrap text-dark">
                                        <span class="small round badge badge-secondary" id="cartValue">0</span>
                                        <div>Cart</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <div class="widget-header">
                                <a href="{{ route('login') }}" data-offset="20,10">
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
@yield('content')
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
<script src="{{ asset('plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/sweetalert2/js/sweetalert2.js') }}"></script>
<script src={{ asset('js/frontend.js') }}></script>
<script src={{ asset('js/jquery.ajax-setup.js') }}></script>
@stack('scripts')
<script>
    $(function () {
        $.ajax({
            type: 'GET',
            url: '/carts/count',
            success: function (res) {
                $('#cartValue').text(res.cartCount);
            }
        });
    });
</script>
</html>
