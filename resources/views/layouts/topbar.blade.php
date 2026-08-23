<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <nav class="navbar navbar-expand-md navbar-dark">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-icon" aria-hidden="true">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('entry-rules') }}">Entry Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('pages-profile') }}">Entry Form</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('payments') }}">Payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('status.index') }}">Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <div class="d-flex align-items-center gap-2 ms-auto topbar-actions">
                <div class="vintage-clock" id="entry-countdown" aria-label="Entry deadline countdown">
                    <div class="time-unit">
                        <div class="time-value">00</div>
                        <div class="time-label">Days</div>
                    </div>
                    <div class="time-separator">:</div>
                    <div class="time-unit">
                        <div class="time-value">00</div>
                        <div class="time-label">Hours</div>
                    </div>
                    <div class="time-separator">:</div>
                    <div class="time-unit">
                        <div class="time-value">00</div>
                        <div class="time-label">Minutes</div>
                    </div>
                    <div class="time-separator">:</div>
                    <div class="time-unit">
                        <div class="time-value">00</div>
                        <div class="time-label">Seconds</div>
                    </div>
                </div>

                <script>
                    (function () {
                        const countdownDate = new Date("2025-07-05T23:59:59").getTime();
                        const clock = document.getElementById('entry-countdown');
                        if (!clock) return;

                        const values = clock.querySelectorAll('.time-value');
                        const timer = setInterval(function () {
                            const distance = countdownDate - Date.now();
                            if (distance < 0) {
                                clearInterval(timer);
                                clock.innerHTML = '<div style="color:#FFD700;font-size:0.9rem;padding:0.35rem 0.5rem;">EXPIRED</div>';
                                return;
                            }

                            values[0].textContent = String(Math.floor(distance / (1000 * 60 * 60 * 24))).padStart(2, '0');
                            values[1].textContent = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                            values[2].textContent = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                            values[3].textContent = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                        }, 1000);
                    })();
                </script>

                @if (Auth::user())
                <div class="dropdown header-item">
                    <button type="button" class="btn p-0" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                 src="@if (Auth::user()->avatar && Str::startsWith(Auth::user()->avatar, 'data:image/'))
                                         {{ Auth::user()->avatar }}
                                      @elseif (Auth::user()->avatar)
                                         {{ URL::asset('images/' . Auth::user()->avatar) }}
                                      @else
                                         {{ URL::asset('build/images/users/avatar-1.jpg') }}
                                      @endif"
                                 alt="Header Avatar">
                            <span class="text-start ms-2">
                                <span class="d-none d-lg-inline-block fw-medium user-name-text">{{ Auth::user()->name }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}..!</h6>
                        <a class="dropdown-item" href="pages-profile"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span class="t-logout" key="t-logout">@lang('translation.logout')</span></a>
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
