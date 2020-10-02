
<!DOCTYPE html>
<html>

<head>
    @include('partials._meta')
    @include('partials._title')
    @include('partials._style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('partials._nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
      @include('partials._sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark text-capitalize">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                  @yield('content')
                </div>
            </section>
        </div>
    @include('partials._footer')
    </div>
    @include('partials._script')
    <script src="{{ asset('plugins/sweetalert2/js/sweetalert2.js') }}"></script>
    @stack('scripts')
</body>

</html>
