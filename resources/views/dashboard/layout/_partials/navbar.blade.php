<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">

        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{auth()->user()->name}}</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">

                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="#">
                        <i class="me-50" data-feather="user"></i>
                        <span class="text-wrap fw-bolder">{{auth()->user()?->first_name}}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{route('dashboard.logout')}}" method="post" id="logout">
                        @csrf
                        @method('delete')
                    </form>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('logout').submit()">
                        <i class="me-50" data-feather="power"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

