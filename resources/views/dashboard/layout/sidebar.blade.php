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
                    <a class="nav {{ Request::is('dashboard/wallets') ? 'active' : '' }}" href="#">
                        <i class='bx bx-wallet icon'></i>
                        <span class="text nav-text">Wallets</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-content">
            <li class="nav-link">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-button">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </button>
                </form>
            </li>

        </div>
</nav>
