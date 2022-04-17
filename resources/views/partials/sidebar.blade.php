<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Commerce</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item {{ Request::is('kategori/index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('indexKategori') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Kategori</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('product/index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('indexProduct') }}">
            <i class="fas fa-fw fa-tag"></i>
            <span>Produk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('pelanggan/index') ? 'active' : '' }}" href="{{ route('indexPelanggan') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('pesanan/index') ? 'active' : '' }}" href="{{ route('indexPesanan') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pesanan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('laporan/index') ? 'active' : '' }}" href="{{ route('indexLaporan') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>laporan</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
