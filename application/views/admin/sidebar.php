<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/mobil')?>">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Data Mobil</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/kostumer')?>">
                    <i class="fas fa-fw fa-eye"></i>
                    <span>Data Kostumer</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/transaksi')?>">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Transaksi Rental</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/laporan')?>">
                    <i class="fas fa-fw fa-paste"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->