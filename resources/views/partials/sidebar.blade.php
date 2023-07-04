@if (Auth::check() && Auth::user()->akses == 'superadmin')
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{ url('dashboard', []) }}"><img src="{{ asset('aceng') }}/assets/images/logo/poscandu.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }} ">
                    <a href="{{ url('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-columns-gap"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin','admin.tambah','admin.edit') ? 'active' : '' }}">
                    <a href="{{ url('admin', []) }}" class='sidebar-link'>
                        <i class="bi bi-person-check"></i>
                        <span>Data Admin</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
@endif

@if (Auth::check() && Auth::user()->akses == 'admin')
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{ url('dashboard', []) }}"><img src="{{ asset('aceng') }}/assets/images/logo/poscandu.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }} ">
                    <a href="{{ url('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-columns-gap"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('posyandu','posyandu.tambah','posyandu.edit','posyandu.tambah','posyandu.detail','posyandu.tambah','tambahdetail.posyandu') ? 'active' : '' }}">
                    <a href="{{ url('/posyandu') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Data Posyandu</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('kader','kader.tambah','kader.edit') ? 'active' : '' }}">
                    <a href="{{ url('/kader') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Data Kader</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('balita','balita.tambah','balita.edit','tambahdetail.balita','lihatdetail.balita') ? 'active' : '' }}">
                    <a href="{{ url('/balita') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Data Balita</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('hasiltimbangan') ? 'active' : '' }}">
                    <a href="{{ url('hasiltimbangan') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Data Hasil Timbangan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('grafik') ? 'active' : '' }}">
                    <a href="{{ url('grafik') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Grafik</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
@endif

@if (Auth::check() && Auth::user()->akses == 'kader' && Auth::user()->email_verified_at)
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-center">
                <div class="logo">
                    <a href="{{ url('dashboard', []) }}"><img src="{{ asset('aceng') }}/assets/images/logo/poscandu.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ Route::is('dashboard') ? 'active' : '' }} ">
                    <a href="{{ url('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-columns-gap"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('balita','balita.tambah','balita.edit','tambahdetail.balita','lihatdetail.balita') ? 'active' : '' }}">
                    <a href="{{ url('/balita') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data"></i>
                        <span>Data Balita</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
@endif
