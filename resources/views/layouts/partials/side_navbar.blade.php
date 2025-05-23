<!-- Sidebar -->
<div class="navbar-vertical navbar nav-dashboard">
    <div class="h-100" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <!-- Brand logo -->
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="{{ asset('images/logo/logo.jpg') }}" alt="RMS">
                            </a>
                            <!-- Navbar nav -->
                            <ul class="navbar-nav flex-column" id="sideNavbar">
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('home') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home nav-icon me-2 icon-sm"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> {{ __('Dashboard') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 0;
                                @endphp
                                @if($dev)
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('appointments.index') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sidebar nav-icon me-2 icon-sm"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg> {{ __('Appointments') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('customers.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user nav-icon me-2 icon-sm"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> {{ __('Customers') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('vehicles.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square nav-icon me-2 icon-sm"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> {{ __('Vehicles') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <!-- Nav item -->
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('jobs.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file nav-icon me-2 icon-sm"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> {{ __('Jobs') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('jobcards.create') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout nav-icon me-2 icon-sm"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg> {{ __('Job card') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('quotes.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit nav-icon me-2 icon-sm"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> {{ __('Quotes') }}
                                    </a>
                                </li>
                                @endif
                                @php
                                    $dev = 1;
                                @endphp
                                @if($dev)
                                <li class="nav-item">
                                    <a class="nav-link has-arrow " href="{{ route('invoices.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard nav-icon me-2 icon-sm"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg> {{ __('Invoices') }}
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar end -->