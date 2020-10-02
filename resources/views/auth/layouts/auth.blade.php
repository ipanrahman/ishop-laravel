<!DOCTYPE html>
<html>

<head>
    @include('partials._meta')
    @include('partials._title')
    @include('partials._style')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home') }}"><b>i</b>Shop</a>
        </div>
        <!-- /.login-logo -->
        @yield('content')
    </div>
    <!-- /.login-box -->

    @include('partials._script')

</body>

</html>
