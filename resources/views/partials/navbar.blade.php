<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header flex items-center py-4 px-6 h-header-height">
            @if (Auth::user()->level == 'admin')
                <a href="/dashboard" class="b-brand flex items-center gap-3">
                @else
                    <a href="/gajidosen" class="b-brand flex items-center gap-3">
            @endif
            <!-- ========   Change your logo from here   ============ -->
            <h3 class="text-white">Penggajian</h3>
            {{-- <img src="{{ asset('assets/images/logo-white.svg') }}" class="img-fluid logo logo-lg" alt="logo" />
                <img src="{{ asset('assets/images/favicon.svg') }}" class="img-fluid logo logo-sm" alt="logo" /> --}}
            </a>
        </div>
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                @if (Auth::user()->level == 'admin')
                    <li class="pc-item">
                        <a href="/dashboard" class="pc-link">
                            <span class="pc-micon">
                                <i data-feather="home"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item pc-caption">
                        <label>Master Data</label>
                        <i data-feather="feather"></i>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('dosen.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="users"></i></span>
                            <span class="pc-mtext">Dosen</span>
                        </a>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('matkul.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="book-open"></i></span>
                            <span class="pc-mtext">Matkul</span>
                        </a>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('jaraksks.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="map"></i></span>
                            <span class="pc-mtext">Jarak & SKS</span>
                        </a>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('tunjangan.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="dollar-sign"></i></span>
                            <span class="pc-mtext">Tunjangan</span>
                        </a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Penjadwalan</label>
                        <i data-feather="monitor"></i>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('penjadwalan.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="book"></i></span>
                            <span class="pc-mtext">Penjadwalan</span>
                        </a>
                    </li>

                    <li class="pc-item pc-caption">
                        <label>Absensi</label>
                        <i data-feather="monitor"></i>
                    </li>
                    {{-- <li class="pc-item pc-hasmenu">
                    <a href="{{ route('absensi') }}" class="pc-link">
                        <span class="pc-micon"> <i data-feather="list"></i></span>
                        <span class="pc-mtext">Absensi</span>
                    </a>
                </li> --}}

                    <li class="pc-item pc-caption">
                        <label>Gaji</label>
                        <i data-feather="monitor"></i>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('penggajian.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="book"></i></span>
                            <span class="pc-mtext">Penggajian</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->level == 'dosen')
                    <li class="pc-item pc-caption">
                        <label>Gaji</label>
                        <i data-feather="monitor"></i>
                    </li>
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('penggajian.index') }}" class="pc-link">
                            <span class="pc-micon"> <i data-feather="book"></i></span>
                            <span class="pc-mtext">Gaji Dosen</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
