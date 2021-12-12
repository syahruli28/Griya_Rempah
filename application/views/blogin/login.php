<?php

if($this->session->userdata('email_user')){
    redirect('Slogin/HalamanDashboard');
}

;?>

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

    <!-- favico -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/griyarempah/img/griyarempah.png">

    <meta name="description" content="<?= $desc;?>">
    <meta name="og:description" content="<?= $desc;?>">
    <meta name="robots" content="index,follow">
    <meta name="author" content="griyarempah.com">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;400&display=swap" rel="stylesheet">
    <!-- Griya rempah CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/css/style.css">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="<?= base_url();?>assets/griyarempah/fontawesome/css/all.css">

    <title>GRIYA REMPAH | Halaman Login</title>
</head>
<body>

    <!-- LOADER -->
    <div class="preloader">
        <div class="loading">
            <div class="loader"></div>
            <p class="ml-3 mt-2">Harap Tunggu</p>
        </div>
    </div>



    <!-- SECTION CARD LOGIN -->
    <div class="section-login mb-5">
        <div class="container">
        
            <?php if ( $this->session->flashdata('msg-success') ) : ?>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Akun <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> .
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> -->
                        </div>
                    </div>
                </div>
            <?php elseif ( $this->session->flashdata('message') ): ?>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message'); ?>.
                        </div>
                    </div>
                </div>
            <?php elseif ( $this->session->flashdata('logout-msg') ): ?>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('logout-msg'); ?>.
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="row justify-content-around login-card">


                <div class="col">

                    <h1 class="mb-5">Griya Rempah</h1>

                    <?= form_open('Auth') ;?>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan email atau username" style="width: 300px;" name="username">
                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan password" style="width: 300px;" name="password">
                        <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <button type="submit" class="btn tombol-produk">Masuk</button>
                    <?= form_close() ;?>

                    <hr>

                    <a href="<?= base_url();?>Blogin/TambahUser">Belum punya akun? daftar sekarang.</a><br>
                    <a href="<?= base_url();?>Blogin">Kembali</a>

                </div>
            </div>

        </div>
    </div>
    <!-- Akhir SECTION CARD LOGIN -->