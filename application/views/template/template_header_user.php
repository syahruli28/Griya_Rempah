<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Pusat beli online rempah-rempah">
    <meta name="keywords" content="Pusat beli online madu asli">
    <meta name="keywords" content="Pusat beli online kurma asli">
    <meta name="keywords" content="Pusat jual online madu asli">
    <meta name="keywords" content="Pusat jual online kurma asli">

    <meta name="description" content="<?= $desc;?>">
    <meta name="og:description" content="<?= $desc;?>">
    <meta name="robots" content="index,follow">
    <meta name="author" content="griyarempah.com">
    <!-- favico -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/griyarempah/img/griyarempah.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;400&display=swap" rel="stylesheet">
    <!-- Griya rempah CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/css/style.css">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/fontawesome/css/all.css">
    <!-- lightbox CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/lightbox/dist/css/lightbox.css">

    <style>
        .tf-wa{
            position: fixed;
            bottom: 5%;
            right: 5%;
            width: 200px;
            background-color: #484;
            padding: 15px 30px;
            border-radius: 40px;
            text-align: center;
        }
        .tf-wa a{
            color: #fff;
        }
    </style>

    <title><?= $judul;?></title>
</head>
<body>

    <!-- LOADER -->
    <div class="preloader">
        <div class="loading">
            <div class="loader"></div>
            <p class="ml-3 mt-2">Harap Tunggu</p>
        </div>
    </div>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-uppercase font-weight-bold mr-auto" href="<?= base_url();?>Blogin">
                <img src="<?= base_url('assets/griyarempah/img/griyarempah.png');?>" alt="griyarempah" width="320px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#modalSearch">
                        Cari
                        <i class="fas fa-search"></i>
                    </a>
                    <a class="nav-item nav-link search-icon" href="<?= base_url();?>Blogin/KeranjangBelanja">
                        <i class="fas fa-shopping-cart"> (<?= $this->cart->total_items();?>)</i>
                    </a>
                    <a class="nav-item nav-link" href="<?= base_url();?>Blogin/HalamanGaleri">Galeri</a>
                    <a class="nav-item nav-link" href="<?= base_url();?>Blogin/HalamanTentangKami">Tentang Kami & FAQ</a>
                    <a class="nav-item btn tombol" href="<?= base_url();?>Auth">
                        <?php if($this->session->userdata('nama_user') == FALSE ) : ?>
                            <?= 'Log In';?>
                        <?php elseif($this->session->userdata('nama_user') == TRUE ) : ?>
                            <?= $this->session->userdata('nama_user') ;?>
                        <?php endif;?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- AKhir Navbar -->