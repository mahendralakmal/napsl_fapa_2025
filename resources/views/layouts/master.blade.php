<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="horizontal" data-topbar="dark"
    data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-bs-theme="dark" data-layout-width="fluid">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://www.napsl.com/storage/images/logos/favico.png">
    @include('layouts.head-css')
</head>

@section('body')
    @include('layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.topbar')
        {{-- @include('layouts.sidebar') --}}
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="margin-top: 0px !important;margin-bottom: 10px !important;">
                <div class="container-fluid">

                    @if ($errors->any())
                        <div class="alert alert-danger error-seg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

   {{-- @include('layouts.customizer') --}}

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')
<script>
    setTimeout(function() {
        $('.error-seg').fadeOut('fast');
    }, 15000);
</script>
</body>

</html>
