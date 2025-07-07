<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-bs-theme="dark" data-layout-width="fluid"><head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://www.napsl.com/storage/images/logos/favico.png">
    <!-- Layout config Js -->
<script src="http://napsl.co/build/js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="http://napsl.co/build/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="http://napsl.co/build/css/icons.min.css" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="http://napsl.co/build/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
<!-- custom Css-->
<link href="http://napsl.co/build/css/custom.min.css" id="app-style" rel="stylesheet" type="text/css">

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
        color: #ffffff;
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
        height: 10rem !important;
        min-height: 10rem;
    }
    .dropdown-header{
        color: #212529 !important;
    }

    .dropdown-menu a,
    .dropdown-menu .dropdown-item,
    .align-middle,
    .t-logout {
        color: #212529 !important; /* Ensures links/items are also dark */
    }

    .dropdown-menu a:hover,
    .dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1 !important;
        color: #000000 !important;
    }

    .bx-power-off {
        position: relative;
        top: 10px;
    }

    .entry-title{
        text-align: center;
        border-bottom: 1px solid #e5e5e5;
        padding-bottom: 12px;
        margin-top: 2rem;
        background-color: #2781d9;
        color: #ffffff;
        padding: 7px;
        margin-block-start: auto;
    }

    .hamburger-icon{
        display: none;
    }

    .vintage-clock{
        position: relative;
        top: 45px;
        right: -100px;
    }
    .time-value{
        position: relative;
        top: -30px
    }

    .time-label{
        position: relative;
        top: -25px
    }
    .time-separator{
        position: relative;
        top: -7px
    }

    .container, .container-fluid, .container-xxl, .container-xl, .container-lg, .container-md, .container-sm {
        --vz-gutter-x: 2.5rem !important;
    }

    @media (max-width: 1366px) {
        .page-header {
            padding: 20px 24px;
            font-size: 1.1rem;
        }
        .page-header img {
            max-width: 80%;
        }
        .vintage-clock{
            position: relative;
            top: 45px;
            right: -80px;
        }

        .no-js .owl-carousel, .owl-carousel.owl-loaded {
            position: relative;
            margin-top: 35px;
        }
        .owl-carousel .item img {
            width: 900px;
            height: 535px;
        }
        .container, .container-fluid, .container-xxl, .container-xl, .container-lg, .container-md, .container-sm {
            --vz-gutter-x: 2.5rem !important;
        }
    }

    @media (max-width: 393px) { /* Approximate logical width */
        .page-header {
            padding: 10px 8px;
            font-size: 1rem;
        }
        .page-header img {
            max-width: 60%;
        }
        .vintage-clock {
            position: relative;
            top: 45px;
            right: 35px;
        }
        .no-js .owl-carousel, .owl-carousel.owl-loaded {
            position: relative;
            margin-top: 35px;
        }
        .owl-carousel .item img {
            width: 100%;
            height: 315px;
        }
        .container, .container-fluid, .container-xxl, .container-xl, .container-lg, .container-md, .container-sm {
            --vz-gutter-x: 2.5rem !important;
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
        .vintage-clock{
            position: relative;
            top: 45px;
            right: 0px;
        }

        .container, .container-fluid, .container-xxl, .container-xl, .container-lg, .container-md, .container-sm {
            --vz-gutter-x: 2.5rem !important;
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
        .vintage-clock{
            position: relative;
            top: 45px;
            right: 35px;
        }

        .no-js .owl-carousel, .owl-carousel.owl-loaded {
            position: relative;
            margin-top: 0px;
        }

        .owl-carousel .item img {
            width: 100%;
            height: 315px;
        }

        .container, .container-fluid, .container-xxl, .container-xl, .container-lg, .container-md, .container-sm {
            --vz-gutter-x: 2.5rem !important;
        }
    }

    @media (max-width: 668px) {
        .hamburger-icon{
            display: block;
        }
        .hamburger-icon span {
            background-color: #e9ebec;
            max-height: 2px;
        }

        .hamburger-icon span:nth-child(1) {
            top: 10px;
            width: 100% !important;
        }

        .hamburger-icon span:nth-child(2) {
            top: 16px;
            width: 100% !important;
        }

        .hamburger-icon span:nth-child(3) {
            bottom: 11px;
            width: 100% !important;
        }

        nav.navbar.navbar-expand-md.navbar-light {
            width: 140px;
            min-height: 300px;
            position: absolute;
            top: 20px;
        }

        #navbarSupportedContent {
            background-color: #09004f;
            padding: 0 10px;
            min-height: 210px
        }


    }
</style>
<style>undefined</style>
    </head>
    <body style="background-color: #efefef !important;">
        <div class="main-content">
            <div class="page-content" style="margin-top: 0px !important;margin-bottom: 10px !important;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                @if($data['responseText'] ==="00")
                                    <div class="card-header">Payment Successful</div>
                                @else
                                    <div class="card-header" style="color: #ff0000">Transaction Failed. Please check with your merchent</div>
                                @endif

                                <div class="card-body">
                                    <p>Thank you for your payment!</p>
                                    <p>Transaction Reference: {{ $data['txnReference'] }}</p>
                                    <p>Amount: {{ $data['transactionAmount']['paymentAmount'] / 100 }} {{ $data['transactionAmount']['currency'] }}</p>
                                    <p>Status: {{ $data['responseText'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- JAVASCRIPT -->
    <script src="http://napsl.co/build/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://napsl.co/build/libs/simplebar/simplebar.min.js"></script>
<script src="http://napsl.co/build/libs/node-waves/waves.min.js"></script>
<script src="http://napsl.co/build/libs/feather-icons/feather.min.js"></script>
<script src="http://napsl.co/build/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="http://napsl.co/build/js/plugins.js"></script><script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script type="text/javascript" src="build/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script type="text/javascript" src="build/libs/flatpickr/flatpickr.min.js"></script>


<script>
    var navbarMenuElement = document.querySelector(".navbar-menu");
    var navbarMenuHTML = navbarMenuElement ? navbarMenuElement.innerHTML : "";
</script>
<script>
    setTimeout(function() {
        $('.error-seg').fadeOut('fast');
    }, 15000);
</script>



</body></html>
