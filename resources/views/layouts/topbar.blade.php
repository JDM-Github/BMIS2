<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark pb-0 mb-3 "
    style="background: linear-gradient(to right, #470120FF, #a30448); padding: 10px 20px; left: -20px; width: calc(100% + 40px)">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-end w-100" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center">

                @if (isset($notifications))
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link" href="#" role="button" id="notificationButton" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-bell fa-lg text-white" style="font-size: 2rem"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end mt-2 me-4 py-1" id="notificationDropdown">
                            @if (isset($notifications) && $notifications->isNotEmpty())
                                @foreach ($notifications as $notification)
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <div class="me-3">
                                            <i class="fas fa-bell text-primary" style="font-size: 20px;"></i>
                                        </div>
                                        <div style="margin-left: 5px;">
                                            <strong>{{ $notification->title }}</strong>
                                            <p class="mb-0 text-muted" style="font-size: 12px;">
                                                {{ $notification->message }}
                                            </p>
                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endforeach
                            @else
                                <a class="dropdown-item d-flex align-items-center">
                                    <span class="mb-0 font-small text-gray-900">No new notifications</span>
                                </a>
                            @endif
                        </div>
                    </li>
                @endif


                <!-- User Profile & Logout Menu -->
                <li class="nav-item dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="media d-flex align-items-center">
                            <img class="avatar rounded-circle"
                                src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"
                                alt="{{ Auth::user()->name }}">
                            <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                {{-- <span class="mb-0 font-small fw-bold text-gray-900">{{ auth()->user()->name }}</span> --}}
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ __('My Profile') }}
                        </a>
                        <div role="separator" class="dropdown-divider my-1"></div>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                            <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                            {{ __('Log Out') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
