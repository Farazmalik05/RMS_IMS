<div class="header">
    <!-- navbar -->
    <div class="navbar-custom navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <a class="navbar-brand d-block d-md-none" href="<?php echo e(route('home')); ?>">
                <img style="max-height:31px;" src="<?php echo e(asset('images/logo/logo.jpg')); ?>" alt="Image">
            </a>
            <a id="nav-toggle" href="#!" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                    <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                </svg>
            </a>

            <!--Navbar nav -->
            <ul class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#!" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="<?php echo e(asset('images/avatar/avatar.jpg')); ?>" class="rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <div class="px-4 pb-0 pt-2">
                            <div class="lh-1 ">
                                <h5 class="mb-1"><?php echo e(Auth::user()->name); ?></h5>
                            </div>
                            <div class=" dropdown-divider mt-3 mb-2"></div>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#!">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user me-2 icon-xxs dropdown-item-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>Edit
                                    Profile
                                </a>
                            </li>
                            <?php if(auth()->user()->is_admin): ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('admin.settings.index')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity me-2 icon-xxs dropdown-item-icon"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>Settings
                                </a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power me-2 icon-xxs dropdown-item-icon"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg><?php echo e(__('Sign Out')); ?>

                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- navbar end -->
</div>
<!-- navbar vertical --><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/layouts/partials/top_navbar.blade.php ENDPATH**/ ?>