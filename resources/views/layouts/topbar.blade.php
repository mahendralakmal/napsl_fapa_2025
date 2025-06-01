<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entry-rules') }}">Entry Rules</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('pages-profile') }}">Entry Form</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('payment') }}">Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('status.index') }}">Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            <div class="d-flex align-items-center">
                <div class="timer" style="font-weight:bold; font-size:1.1em; width:150px; padding-top:8px;"></div>
                {{-- Countdown Timer Script --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const timerElement = document.querySelector('.timer');
                        // Set the end date: 30 June 2025 23:59:59
                        const endDate = new Date('2025-06-30T23:59:59');
                        function getGradientColor(daysLeft) {
                            // 15 days left: yellow (#FFFF00), 0 days left: red (#FF0000)
                            if (daysLeft > 15) return "#00fa39"; // Bootstrap green
                            if (daysLeft <= 3) return "#FF0000"; // Red for last 3 days
                            // Interpolate between yellow and red
                            // yellow: rgb(255,255,0), red: rgb(255,0,0)
                            const ratio = daysLeft / 15;
                            const g = Math.round(255 * ratio);
                            return `rgb(255,${g},0)`;
                        }
                        function updateTimer() {
                            const now = new Date();
                            let diff = endDate - now;
                            let days = 0, hours = 0, minutes = 0, seconds = 0;
                            if (diff > 0) {
                                days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                                minutes = Math.floor((diff / (1000 * 60)) % 60);
                                seconds = Math.floor((diff / 1000) % 60);
                            }
                            timerElement.textContent =
                                days.toString().padStart(2, '0') + " d " +
                                hours.toString().padStart(2, '0') + " h " +
                                minutes.toString().padStart(2, '0') + " m " +
                                seconds.toString().padStart(2, '0') + " s";
                                // days.toString().padStart(2, '0') + " days " +
                                // hours.toString().padStart(2, '0') + "hours " +
                                // minutes.toString().padStart(2, '0') + "minutes " +
                                // seconds.toString().padStart(2, '0') + "seconds";
                            // Set color
                            if (diff > 0) {
                                timerElement.style.color = getGradientColor(days);
                            } else {
                                timerElement.style.color = "#FF0000";
                                timerElement.textContent = "00 d 00 h 00 m 00 s";
                                // timerElement.textContent = "00 days 00hours 00minutes 00seconds";
                                clearInterval(interval);
                            }
                        }
                        updateTimer();
                        const interval = setInterval(updateTimer, 1000);
                    });
                </script>
                @if (Auth::user())
                <div class="dropdown ms-sm-3 header-item" >
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="@if (Auth::user()->avatar != ''){{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('build/images/users/avatar-1.jpg') }}@endif" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{Auth::user()->name}}</span>
                                {{-- <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span> --}}
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome {{auth()->user()->name}}..!</h6>
                        <a class="dropdown-item" href="pages-profile"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span class="t-logout" key="t-logout">@lang('translation.logout')</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</header>

@section('script')

@parent
<script>
    var navbarMenuElement = document.querySelector(".navbar-menu");
    var navbarMenuHTML = navbarMenuElement ? navbarMenuElement.innerHTML : "";
</script>
@endsection
