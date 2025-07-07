<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>



    @if (Auth::user()->level == 'admin')
        <!-- Nav Item - Charts -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Master Data</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Master Data:</h6>
                    <a class="collapse-item" href="{{ route('dosen.index') }}">Daftar Dosen</a>
                    <a class="collapse-item" href="{{ route('matkul.index') }}">Mata Kuliah</a>
                    <a class="collapse-item" href="{{ route('jaraksks.index') }}">Jarak & SKS</a>
                    <a class="collapse-item" href="{{ route('tunjangan.index') }}">Tunjangan</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('penjadwalan.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Penjadwalan</span></a>
        </li>

        <!-- Nav Item - Tables -->
    @endif

    @if (Auth::user()->level == 'dosen')
    @endif

</ul>
