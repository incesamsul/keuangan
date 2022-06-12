<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src={{ asset('img/logo.png') }} height="42" width="70">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">TP</a>
        </div>
        <ul class="sidebar-menu">

            {{-- MENU PENGGUNA --}}
            {{-- SEMUA PENGGUNA / USER MEMPUNYAI MENU INI --}}
            <li class="menu-header">Pengguna</li>
            <li class="" id="liDashboard"><a class="nav-link" href="{{ URL::to('/dashboard') }}"><i
                        class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="" id="liProfile"><a class="nav-link" href="{{ URL::to('/profile') }}"><i
                        class="fas fa-user"></i>
                    <span>Profile</span></a></li>
            {{-- <li class="" id="liBantuan"><a class="nav-link" href="{{ URL::to('/bantuan') }}"><i
                        class="fas fa-question-circle"></i> <span>Bantuan</span></a></li> --}}



            @if (auth()->user()->role == 'Administrator')
                {{-- MENU ADMIN --}}
                <li class="menu-header">Admin</li>
                <li class="nav-item dropdown " id="liPengguna">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                        <span>Pengguna</span></a>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/admin/pengguna">Manajemen
                                Pengguna</a></li>
                    </ul>
                </li>

                {{-- END OF MENU ADMIN --}}
            @endif

            @if (auth()->user()->role == 'staff')
                {{-- MENU STAFF --}}
                <li class="menu-header">Staff</li>
                <li class="nav-item dropdown " id="liData">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list-alt"></i>
                        <span>Data</span></a>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/staff/data_akun">Data Akun</a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/staff/data_pelanggan">Data Pelanggan</a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/staff/data_pemasok">Data Pemasok</a>
                        </li>
                    </ul>
                </li>
                <li id="liData">
                    <a href="/staff/jurnal"><i class="fas fa-fax"></i>
                        <span>Jurnal</span></a>
                </li>
                <li id="liData">
                    <a href="/staff/buku_besar"><i class="fas fa-book"></i>
                        <span>Buku Besar</span></a>
                </li>
                <li id="liData">
                    <a href="/staff/neraca_saldo"><i class="fas fa-balance-scale"></i>
                        <span>Neraca Saldo</span></a>
                </li>
                <li class="nav-item dropdown " id="liData">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i>
                        <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/staff/laba_rugi">Laporan L/R</a>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/staff/laporan_modal">Laporan
                                Modal</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/staff/laporan_neraca">Laporan
                                Neraca</a></li>
                    </ul>
                </li>
                {{-- END OF MENU STAFF --}}
            @endif

            @if (auth()->user()->role == 'pimpinan')
                {{-- MENU PIMPINAN --}}
                <li class="menu-header">Pimpinan</li>
                <li class="nav-item dropdown " id="liData">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                        <span>Laporan</span></a>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/pimpinan/laba_rugi">Laporan
                                L/R</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/pimpinan/laporan_modal">Laporan
                                Modal</a></li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li id="liManajemenPengguna"><a class="nav-link" href="/pimpinan/laporan_neraca">Laporan
                                Neraca</a></li>
                    </ul>
                </li>
                {{-- END OF MENU PIMPINAN --}}
            @endif







        </ul>


        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ URL::to('/logout') }}" class="btn btn-warning btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
