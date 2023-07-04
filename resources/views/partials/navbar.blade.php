<nav class="navbar navbar-expand navbar-light ">
    <div class="container-fluid">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown me-1">
                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Mail</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">Tidak ada email baru</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3">
                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Notifications</h6>
                        </li>
                        <li><a class="dropdown-item">Tidak ada notifikasi</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                            <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->akses }}</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                @if (Auth::check() && Auth::user()->foto_user)
                                <img src="{{ url('foto_user/'.Auth::user()->foto_user) }}"/>
                                @else
                                <img src="{{ url('aceng/assets/images/faces/blank.png') }}"/>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li>
                        <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}</h6>
                    </li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('profil', []) }}">
                            
                            <i class="icon-mid bi bi-person me-2"></i>
                            Profil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('logout', []) }}">
                            
                            <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>