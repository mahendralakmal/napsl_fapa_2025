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
        /* top: 4.5rem; */
    }
    .page-header img {
        max-width: 100%;
        height: auto;
        display: block;
    }

    @media (max-width: 1366px) {
        .page-header {
            padding: 20px 24px;
            font-size: 1.1rem;
        }
        .page-header img {
            max-width: 80%;
        }
    }

    /* Tablet */
    @media (max-width: 900px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 16px 20px;
        }
        .page-header img {
            max-width: 70%;
        }
    }

    /* Mobile */
    @media (max-width: 600px) {
        .page-header {
            padding: 10px 8px;
            font-size: 1rem;
        }
        .page-header img {
            max-width: 60%;
        }
    }
    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 35px;
        padding: 10px 0.75rem;
    }

    #page-topbar {
        background-color: #020251 !important;
        border-bottom: 1px solid #dee2e6 !important;
        box-shadow: 0 5px 5px #2928283d !important;
        position: relative;
    }
    #page-topbar,
    #page-topbar * {
        color: #ffffff !important;
        font-weight: bold !important;
        /* text-shadow:
            -.5px -.5px 0 #585858,
             .5px -.5px 0 #585858,
            -.5px  .5px 0 #585858,
             .5px  .5px 0 #585858; */
        height: 35px !important;
    }

    #page-topbar a {
        transition: transform 0.2s ease;
        display: inline-block; /* Needed for transform to work properly */
    }

    #page-topbar a:hover {
        transform: scale(1.15);
    }

    .dropdown-menu {
        background-color: #ffffff !important;
        color: #212529 !important; /* or use #343a40 for darker text */
    }

    .dropdown-menu a,
    .dropdown-menu .dropdown-item {
        color: #212529 !important; /* Ensures links/items are also dark */
    }

    .dropdown-menu a:hover,
    .dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1 !important;
        color: #000000 !important;
    }
</style>
