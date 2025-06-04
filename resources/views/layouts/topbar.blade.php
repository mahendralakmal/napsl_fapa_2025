<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                {{-- <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button> --}}
                <!-- Add this toggler for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="vintage-clock" style="font-family: 'Courier New', monospace; display: flex; gap: 8px; background: #222; padding: 15px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.5);">
                    <div class="time-unit" style="background: #111; padding: 10px; border-radius: 4px; color: #FFD700; text-align: center;">
                        <div class="time-value" style="font-size: 36px; font-weight: bold; letter-spacing: 2px; text-shadow: 0 0 5px rgba(255,215,0,0.7);">28</div>
                        <div class="time-label" style="font-size: 12px; color: #aaa; text-transform: uppercase;">Days</div>
                    </div>
                    <div class="time-separator" style="font-size: 36px; color: #FFD700; align-self: center;">:</div>
                    <div class="time-unit" style="background: #111; padding: 10px; border-radius: 4px; color: #FFD700; text-align: center;">
                        <div class="time-value" style="font-size: 36px; font-weight: bold; letter-spacing: 2px; text-shadow: 0 0 5px rgba(255,215,0,0.7);">11</div>
                        <div class="time-label" style="font-size: 12px; color: #aaa; text-transform: uppercase;">Hours</div>
                    </div>
                    <div class="time-separator" style="font-size: 36px; color: #FFD700; align-self: center;">:</div>
                    <div class="time-unit" style="background: #111; padding: 10px; border-radius: 4px; color: #FFD700; text-align: center;">
                        <div class="time-value" style="font-size: 36px; font-weight: bold; letter-spacing: 2px; text-shadow: 0 0 5px rgba(255,215,0,0.7);">25</div>
                        <div class="time-label" style="font-size: 12px; color: #aaa; text-transform: uppercase;">Minutes</div>
                    </div>
                    <div class="time-separator" style="font-size: 36px; color: #FFD700; align-self: center;">:</div>
                    <div class="time-unit" style="background: #111; padding: 10px; border-radius: 4px; color: #FFD700; text-align: center;">
                        <div class="time-value" style="font-size: 36px; font-weight: bold; letter-spacing: 2px; text-shadow: 0 0 5px rgba(255,215,0,0.7);">35</div>
                        <div class="time-label" style="font-size: 12px; color: #aaa; text-transform: uppercase;">Seconds</div>
                    </div>
                </div>

                <script>
                    const countdownDate = new Date("2025-07-05T23:59:59").getTime();
                    const timer = setInterval(function() {
                        const now = new Date().getTime();
                        const distance = countdownDate - now;

                        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Update the timer display
                        const values = document.querySelectorAll('.time-value');
                        values[0].textContent = days.toString().padStart(2, '0');
                        values[1].textContent = hours.toString().padStart(2, '0');
                        values[2].textContent = minutes.toString().padStart(2, '0');
                        values[3].textContent = seconds.toString().padStart(2, '0');

                        if (distance < 0) {
                            clearInterval(timer);
                            document.querySelector('.vintage-clock').innerHTML = '<div style="color: #FFD700; font-size: 24px; padding: 20px;">EXPIRED</div>';
                        }
                    }, 1000);
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
                @else
                <div class="dropdown ms-sm-3 header-item">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Signin</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
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
