<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow">
    <meta name="author" content="griyarempah.com">

    <!-- favico -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/griyarempah/img/griyarempah.png">

    <title><?= $judul ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="<?= base_url();?>assets/sbadmin2/vendor/fontawesome-free/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="<?= base_url();?>assets/sbadmin2/css/sb-admin-2.min.css">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/fontawesome/css/all.css">
    <style>
    .invoice td{
        display: none;
    }
    @media print {
        .print, .print button, footer{
            display: none;
        }
    }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion print" id="accordionSidebar" style="background-color: #5D4954;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>Blogin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-mortar-pestle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Griya Rempah </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>Slogin/HalamanDashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Toko
            </div>

            <!-- Nav Item - Toko / Produk Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Toko / Produk</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Toko</h6>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/SettingLokasi">Lokasi Toko</a>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanTestimoni">Testimoni</a>
                        <h6 class="collapse-header">Produk</h6>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanProduk">Produk</a>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanKategori">Kategori</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pesanan
            </div>

            <!-- Nav Item - Pesanan Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePesanan"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-comments-dollar"></i>
                    <?php $pesanan = $this->Slogin_model->AmbilDataAntrianPesanan();?>
                    <span>Pesanan (<?= count($pesanan);?>) </span>
                </a>
                <div id="collapsePesanan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pesanan</h6>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanAntrianPesanan">Antrian Pesanan (<?= count($pesanan);?>)</a>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanPesananSelesai">Pesanan Selesai</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Akun
            </div>

            <!-- Nav Item - Akun Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin / User</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaturan Akun</h6>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanAdmin">Admin</a>
                        <a class="collapse-item" href="<?= base_url();?>Slogin/HalamanUser">User</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lainnya
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>Auth/logout">
                <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->