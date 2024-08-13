<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="/img/rico.jpg" alt="User Image">
            </span>
            <div class="text logo-text">
                <span class="name">Codinglab</span>
                <span class="profession">Web developer</span>
            </div>
        </div>
        <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a class="nav {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard/">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a class="nav {{ Request::is('dashboard/show') ? 'active' : '' }}" href="/dashboard/show">
                        <i class='bx bx-history icon'></i>
                        <span class="text nav-text">Histori</span>
                    </a>
                </li>

                <li class="nav-link">
                    <a class="nav {{ Request::is('dashboard/editprofile') ? 'active' : '' }}"
                        href="/dashboard/editprofile">
                        <i class='bx bx-history icon'></i>
                        <span class="text nav-text">profile</span>
                    </a>
                </li>

                <!-- Tambahkan link ini jika user adalah superadmin -->
                @if (auth()->user()->role == 'superadmin')
                    <li class="nav-link">
                        <a class="nav {{ Request::is('dashboard/users') ? 'active' : '' }}" href="/dashboard/users">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">User All</span>
                        </a>
                    </li>
                @endif

                <li class="nav-link">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    <a class="nav" href="#"
                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        </ul>
    </div>

</nav>
