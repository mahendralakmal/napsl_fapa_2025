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
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('judging.index') }}">Home</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex align-items-center gap-2 ms-auto">
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
