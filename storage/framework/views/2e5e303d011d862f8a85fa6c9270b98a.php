<header id="page-topbar" style="border-bottom: 1px solid #dee2e600 !important; box-shadow:0 5px 5px #29282829 !important; background-color: #020251 !important;">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                

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
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('entry-rules')); ?>">Entry Rules</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Entry Form</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Payment</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Status</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            <div class="d-flex align-items-center">
                <div class="dropdown ms-sm-3 header-item" >
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?php if(Auth::user()->avatar != ''): ?><?php echo e(URL::asset('images/' . Auth::user()->avatar)); ?><?php else: ?><?php echo e(URL::asset('build/images/users/avatar-1.jpg')); ?><?php endif; ?>" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo e(Auth::user()->name); ?></span>
                                
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome <?php echo e(auth()->user()->name); ?>..!</h6>
                        <a class="dropdown-item" href="pages-profile"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                        <a class="dropdown-item " href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1"></i> <span key="t-logout"><?php echo app('translator')->get('translation.logout'); ?></span></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /var/www/napsl_ex/resources/views/layouts/topbar.blade.php ENDPATH**/ ?>