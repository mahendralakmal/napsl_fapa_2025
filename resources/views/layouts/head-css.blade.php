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

<style>
    /* ---------- Base layout ---------- */
    html {
        overflow-x: hidden;
    }

    body {
        overflow-x: hidden;
        padding-bottom: 3.5rem; /* room for fixed footer */
    }

    .page-header {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #bde4f7;
        padding: 0.5rem 1rem;
    }

    .page-header img,
    .page-header-banner {
        max-width: 100%;
        width: 70% !important;
        height: auto;
        display: block;
    }

    .footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        min-height: 2.5rem;
        height: auto;
        padding: 0.5rem 0.75rem;
        z-index: 1030;
    }

    .page-content {
        margin-top: 0 !important;
        margin-bottom: 1rem !important;
        padding-bottom: 1rem;
    }

    .container,
    .container-fluid,
    .container-xxl,
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm {
        --vz-gutter-x: 1.5rem;
        max-width: 100%;
    }

    .responsive-panel {
        padding: 1.25rem !important;
    }

    /* ---------- Topbar ---------- */
    #page-topbar {
        background-color: #020251 !important;
        border-bottom: 1px solid #dee2e6 !important;
        box-shadow: 0 5px 5px #2928283d !important;
        position: relative;
        z-index: 1040;
        min-height: 3.5rem;
        height: auto !important;
    }

    #page-topbar .navbar-header {
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        gap: 0.5rem;
        min-height: 3.5rem;
        height: auto !important;
        padding: 0.35rem 0.75rem;
        position: relative;
    }

    #page-topbar,
    #page-topbar .nav-link,
    #page-topbar .navbar-toggler,
    #page-topbar .user-name-text {
        color: #ffffff;
        font-weight: 600;
    }

    #page-topbar .nav-link {
        padding: 0.5rem 0.75rem;
        white-space: nowrap;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }

    #page-topbar .nav-link:hover {
        transform: scale(1.05);
        color: #ffffff;
        opacity: 0.9;
    }

    #page-topbar .navbar {
        grid-column: 1 / -1;
        grid-row: 1;
        justify-self: center;
        width: auto;
        max-width: 100%;
        padding: 0;
        min-width: 0;
        z-index: 1;
    }

    #page-topbar .navbar-collapse {
        justify-content: center;
    }

    #page-topbar .navbar-nav {
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
    }

    #page-topbar .navbar-toggler {
        border: 1px solid rgba(255, 255, 255, 0.35);
        padding: 0.35rem 0.5rem;
        color: #fff;
        position: relative;
        z-index: 2;
    }

    #page-topbar .topbar-actions {
        grid-column: 3;
        grid-row: 1;
        z-index: 2;
        margin-left: 0 !important;
    }

    #page-topbar .hamburger-icon {
        display: inline-block;
        width: 22px;
        height: 16px;
        position: relative;
    }

    #page-topbar .hamburger-icon span {
        position: absolute;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #e9ebec;
        display: block;
    }

    #page-topbar .hamburger-icon span:nth-child(1) { top: 0; }
    #page-topbar .hamburger-icon span:nth-child(2) { top: 7px; }
    #page-topbar .hamburger-icon span:nth-child(3) { top: 14px; }

    .header-profile-user {
        width: 35px;
        height: 35px;
        object-fit: cover;
    }

    .dropdown-menu {
        background-color: #ffffff !important;
        min-height: auto;
        height: auto !important;
    }

    .dropdown-header {
        color: #212529 !important;
    }

    .dropdown-menu a,
    .dropdown-menu .dropdown-item,
    .align-middle,
    .t-logout {
        color: #212529 !important;
    }

    .dropdown-menu a:hover,
    .dropdown-menu .dropdown-item:hover {
        background-color: #f1f1f1 !important;
        color: #000000 !important;
    }

    /* ---------- Countdown ---------- */
    .vintage-clock {
        display: flex;
        align-items: center;
        gap: 0.35rem;
        background: #222;
        padding: 0.35rem 0.5rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        font-family: 'Courier New', monospace;
        flex-shrink: 0;
    }

    .vintage-clock .time-unit {
        background: #111;
        padding: 0.25rem 0.4rem;
        border-radius: 4px;
        color: #FFD700;
        text-align: center;
        min-width: 2.5rem;
    }

    .vintage-clock .time-value {
        font-size: clamp(0.9rem, 1.8vw, 1.35rem);
        font-weight: bold;
        letter-spacing: 1px;
        line-height: 1.1;
        text-shadow: 0 0 5px rgba(255, 215, 0, 0.7);
    }

    .vintage-clock .time-label {
        font-size: 0.55rem;
        color: #aaa;
        text-transform: uppercase;
        line-height: 1.2;
    }

    .vintage-clock .time-separator {
        font-size: clamp(0.9rem, 1.8vw, 1.35rem);
        color: #FFD700;
        line-height: 1;
    }

    /* ---------- Shared page helpers ---------- */
    .entry-title {
        text-align: center;
        border-bottom: 1px solid #e5e5e5;
        margin-top: 1.25rem;
        background-color: #2781d9;
        color: #ffffff;
        padding: 0.5rem;
    }

    .owl-carousel .item img {
        width: 100%;
        max-width: 100%;
        height: auto;
        max-height: min(535px, 70vh);
        object-fit: cover;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .owl-carousel.owl-loaded {
        margin-top: 0.5rem;
    }

    .upload-entry-row {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        gap: 1rem;
    }

    .upload-entry-fields {
        flex: 1 1 220px;
        min-width: 0;
    }

    .uploaded-image {
        flex: 0 1 auto;
    }

    .uploaded-image img {
        max-width: min(250px, 100%);
        max-height: 155px;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
        cursor: pointer;
    }

    @media (hover: hover) and (pointer: fine) {
        .uploaded-image img:hover {
            transform: scale(1.8);
            z-index: 10;
            position: relative;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        }
    }

    /* ---------- Large tablets / small laptops ---------- */
    @media (max-width: 1199.98px) {
        .vintage-clock .time-label {
            display: none;
        }
    }

    /* ---------- Tablets ---------- */
    @media (max-width: 991.98px) {
        .container,
        .container-fluid,
        .container-xxl,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
            --vz-gutter-x: 1rem;
        }

        .responsive-panel {
            padding: 1rem !important;
        }

        .page-header {
            padding: 0.5rem;
        }

        .page-header img {
            max-width: 90%;
        }
    }

    /* ---------- Mobile nav (Bootstrap collapse) ---------- */
    @media (max-width: 767.98px) {
        #page-topbar .navbar-header {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
        }

        #page-topbar .navbar {
            grid-column: auto;
            justify-self: start;
            flex: 0 0 auto;
            order: -1;
            width: auto;
        }

        #page-topbar .navbar-collapse {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #09004f;
            padding: 0.5rem 1rem 1rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
            z-index: 1050;
            justify-content: flex-start;
        }

        #page-topbar .navbar-nav {
            width: 100%;
            margin-left: 0;
            margin-right: 0;
            align-items: stretch;
        }

        #page-topbar .nav-link {
            padding: 0.75rem 0.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            white-space: normal;
            text-align: left;
        }

        #page-topbar .topbar-actions {
            margin-left: auto !important;
        }

        .vintage-clock {
            gap: 0.2rem;
            padding: 0.25rem 0.35rem;
        }

        .vintage-clock .time-unit {
            min-width: 1.85rem;
            padding: 0.15rem 0.25rem;
        }

        .container,
        .container-fluid {
            --vz-gutter-x: 0.75rem;
        }

        .responsive-panel {
            padding: 0.85rem !important;
        }

        .page-header img {
            max-width: 100%;
        }

        .owl-carousel .item img {
            max-height: min(315px, 50vh);
        }

        .upload-entry-row {
            flex-direction: column;
        }

        .footer .col-sm-6 {
            text-align: center !important;
        }
    }

    /* ---------- Small phones ---------- */
    @media (max-width: 575.98px) {
        .vintage-clock {
            display: none; /* avoid crowding tiny screens; form/nav take priority */
        }

        body {
            padding-bottom: 4rem;
        }

        .entry-title {
            font-size: 1rem;
            margin-top: 0.75rem;
        }
    }
</style>
