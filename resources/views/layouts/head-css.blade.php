@yield('css')
<!-- Layout config Js -->
<script src="{{ URL::asset('build/js/layout.js') }}"></script>
<!-- Bootstrap Css -->
<link href="{{ URL::asset('build/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('build/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('build/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{ URL::asset('build/css/custom.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
{{-- @yield('css') --}}
<style>
    .page-header {
        display: flex;
        justify-content: center;
        background-color: #bde4f7;
        position: relative;
        top: 4.5rem;
    }
    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 35px;
        padding: 10px 0.75rem;
    }
</style>
