<div class="left-side-menu mm-show">

    <!-- LOGO -->
    <a href="{{route('admin.welcome')}}" class="logo text-center logo-light mt-2">
        <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100 mm-active" id="left-side-menu-container" data-simplebar="init">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                        <div class="simplebar-content" style="padding: 0px;">

                            <!--- Sidemenu -->
                            <ul class="metismenu side-nav mm-show">

                                <li class="side-nav-item">
                                    <a href="{{route('admin.welcome')}}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('admin.users.index')}}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> Users </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('admin.booking.index')}}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> Booking </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('admin.room.index')}}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> Room </span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{route('admin.city.index')}}" class="side-nav-link">
                                        <i class="uil-home-alt"></i>
                                        <span> City </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: auto; height: 100px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
            <div class="simplebar-scrollbar simplebar-visible"
                style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
        </div>
    </div>
    <!-- Sidebar -left -->
</div>