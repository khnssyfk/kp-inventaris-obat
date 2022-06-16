<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/"><img src="\images\logo\logo-melife.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ Request::is('/') ? 'active' :'' }}"> 
                    <a href="/" class="sidebar-link">
                        <i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('data-pasien*') ? 'active' :'' }}"> 
                    <a href="/data-pasien" class="sidebar-link">
                        <i class="bi bi-file-earmark-person-fill"></i><span>Data Pasien</span></a>
                </li>
                <li class="sidebar-item {{ Request::is('data-dokter*') ? 'active' :'' }}">
                    <a href="/data-dokter" class="sidebar-link"><i class="bi bi-heart-pulse-fill"></i><span>Data Dokter</span></a>
                </li>
                <li class="sidebar-item {{ Request::is('riwayat-pemeriksaan*') ? 'active' :'' }}">
                    <a href="/riwayat-pemeriksaan" class="sidebar-link"><i class="bi bi-file-medical-fill"></i><span>Rekam Medis</span> </a>
                </li>
                <li class="sidebar-item  has-sub {{ Request::is('nama-obat*','obat-masuk*','obat-keluar*','stok-obat*') ? 'active' :'' }} ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data Obat</span>
                    </a>
                    <ul class="submenu {{ Request::is('nama-obat*','obat-masuk*','obat-keluar*','stok-obat*') ? 'active' :'' }}">
                        <li class="submenu-item {{ Request::is('nama-obat*') ? 'active' :'' }}">
                            <a href="/nama-obat">Nama Obat</a>
                        </li>
                        <li class="submenu-item {{ Request::is('obat-masuk*') ? 'active' :'' }}">
                            <a href="/obat-masuk">Obat Masuk</a>
                        </li>
                        <li class="submenu-item {{ Request::is('obat-keluar*') ? 'active' :'' }}">
                            <a href="/obat-keluar">Obat Keluar</a>
                        </li>
                        <li class="submenu-item {{ Request::is('stok-obat*') ? 'active' :'' }} ">
                            <a href="/stok-obat">Stok Obat</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item  has-sub {{ Request::is() ? 'active' :'' }} ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="submenu {{ Request::is() ? 'active' :'' }}">
                        <li class="submenu-item {{ Request::is('nama-obat*') ? 'active' :'' }}">
                            <a href="/nama-obat">Data Obat</a>
                        </li>
                        <li class="submenu-item {{ Request::is() ? 'active' :'' }}">
                            <a href="/obat-masuk">Data Pasien</a>
                        </li>
                    </ul>
                </li> --}}
                <li class="sidebar-item {{ Request::is('data-user*') ? 'active' :'' }}">
                    <a href="/data-user " class="sidebar-link"><i class="bi bi-person-plus-fill"></i><span>Data User</span> </a>
                </li>
            </ul>
        </div>
        </div>
</div>