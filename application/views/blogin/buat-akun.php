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

    <title>GRIYA REMPAH | Buat Akun Baru</title>
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
        
            <div class="row justify-content-around login-card">

                <div class="col">

                    <h1 class="mb-5">Griya Rempah</h1>

                    <?= form_open('Blogin/TambahUser'); ?>
                        <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" style="width: 300px;">
                        <small class="form-text text-danger"><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                        <label for="notelpwa">No. Telp/WA</label>
                        <input type="number" class="form-control" id="notelpwa" name="notelpwa" placeholder="Masukkan No. Telpon" style="width: 300px;">
                        <small class="form-text text-danger"><?= form_error('notelpwa'); ?></small>
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" style="width: 300px;">
                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password" style="width: 300px;">
                        <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        <div class="form-group">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" style="width: 300px;">
                        <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                        </div>
                        <button type="submit" class="btn tombol-produk">Daftar Sekarang</button>
                        <?= form_close(); ?>
                    </form>

                    <hr>
                    <a href="<?= base_url();?>Auth">Kembali</a>

                </div>
            </div>

        </div>
    </div>
    <!-- Akhir SECTION CARD LOGIN -->