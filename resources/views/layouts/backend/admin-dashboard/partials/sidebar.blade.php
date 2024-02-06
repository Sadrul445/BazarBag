<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="{{ asset('backend/assets/images/dashboard/1.png') }}" alt="" />
        <div class="badge-bottom"><span class="badge " style="color: #0DB14B;background:#ffffff">New</span></div>
        @if (Auth::check())
            <a href="#">
                <h6 class="mt-3 f-14 f-w-600">{{ Auth::user()->name }}</h6>
            </a>
            <p class="mb-0 font-roboto">{{ Auth::user()->email }}</p>
        @endif
        <ul>
            <li>
                <span><span class="counter">19.8</span>k</span>
                <p>Follow</p>
            </li>
            <li>
                <span>2 year</span>
                <p>Experince</p>
            </li>
            <li>
                <span><span class="counter">95.2</span>k</span>
                <p>Follower</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    {{-- <li class="sidebar-main-title">
                    </li> --}}
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title " href="javascript:void(0)">
                            <i class="fa-solid fa-calendar-days fa-lg"></i><span class="ms-3">Today Attendance</span>
                        </a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            @if (auth()->user()->role === 'admin')
                                <li><a href="{{ route('admin-dashboard.today-attendances') }}">Today Attendance</a></li>
                            @elseif(auth()->user()->role === 'employee')
                                <li><a
                                        href="{{ route('employee.individual', ['employeeId' => auth()->user()->id]) }}">Today
                                        My Attendance</a></li>
                            @endif
                        </ul>
                    </li> --}}
                    <li class="dropdown">
                        <a class="nav-link menu-title " href="javascript:void(0)"><i class="fa-solid fa-calendar-check fa-lg"></i><span class="ms-3">Categories</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="{{ route('category.create') }}" class="#">Create Categories</a></li>
                            <li><a href="{{ route('category.index') }}" class="#">Show Category</a></li>
                            {{-- <li><a href="#" class="#">List of Employee</a></li> --}}
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title " href="javascript:void(0)"><i class="fa-solid fa-clipboard-user fa-lg"></i><span class="ms-3">Sub Categories</span></a>
                        <ul class="nav-submenu menu-content" style="display: none;">
                            <li><a href="#" class="#">Create Sub Categories</a></li>
                            <li><a href="{{-- {{ route('admin-dashboard.employee-profile.index') }} --}}" class="#">List of Sub Categories</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
