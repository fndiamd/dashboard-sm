<?php 
    $kategori = $this->db->get('kategori')->result();
?>
<aside class="main-sidebar sidebar-light bg-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
        <img src="<?= base_url('assets/dist/img/bimasakti-logo.png') ?>" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">Sales Marketing</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">SM Bimasakti</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fa fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('perbandingan') ?>" class="nav-link">
                        <i class="nav-icon fa fa-card"></i>
                        <p>
                            Data Semua Outlet
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('target-bulanan')?>" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>Target Bulanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('deviasi-bulan')?>" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>Deviasi Bulan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('deviasi-okr')?>" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>Deviasi OKR</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('persentase-okr')?>" class="nav-link">
                        <i class="nav-icon fa fa-warehouse"></i>
                        <p>Persentase OKR</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>