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
        .tf-wa{
            position: fixed;
            bottom: 5%;
            right: 5%;
            width: 280px;
            background-color: #494;
            padding: 15px 30px;
            border-radius: 40px;
            text-align: center;
        }
        .tf-wa a{
            color: #fff;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #5D4954;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>Blogin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-mortar-pestle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Griya Rempah </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

             <!-- Nav Item - Keranjang Saya -->
             <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>SloginUser">
                <i class="fas fa-shopping-cart"></i>
                    <span>Keranjang Saya (<?= $this->cart->total_items();?>)</span> </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pesanan
            </div>

            <!-- Nav Item - Pesanan Saya -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>SloginUser/PesananSaya">
                <i class="fas fa-comments-dollar"></i>
                    <span>Pesanan Saya</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lainnya
            </div>

            <!-- Nav Item - Keluar -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>SloginUser/Info">
                <i class="fas fa-info-circle"></i>
                    <span>Info Belanja / Pembayaran</span></a>
            </li>

            <!-- Nav Item - Keluar -->
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