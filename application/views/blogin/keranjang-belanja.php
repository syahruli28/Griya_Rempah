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
    .navbar-nav a.nav-link, a.navbar-brand{
        color: #f0f0f0!important;
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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #5D4954;">
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
                    <a class="nav-item btn tombol" href="<?= base_url();?>Auth">Log In</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- AKhir Navbar -->
   
    <!-- Jumbotron -->
    <!-- <div class="jumbotron jumbotron-fluid jumcart">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Keranjang Belanja</h1>
        </div>
    </div> -->
    <!-- Akhir Jumbotron -->

    <!-- TABEL CART -->
    <div class="section-tabel-cart mt-5 mb-5">
        <div class="container">

            <div class="row">
                <div class="col">
                    <h3>Keranjang Belanja Anda</h3>
                    <hr>
                </div>
            </div>

            <div class="row">

                <!-- kolom kiri tabel cart -->
                <div class="col">
                <?php echo form_open('SloginUser/Updatecart'); ?>
                    <table class="table">
                        <thead class="thead" style="background-color: #5D4954; color: #fff;">
                        <tr>
                            <th scope="col" style="width: 40px;">No.</th>
                            <th scope="col" style="width:fit-content;">Deskripsi Barang</th>
                            <th scope="col" width="90px">Jumlah</th>
                            <th scope="col">Sub Harga</th>
                            <th scope="col">Opsi</th>
                        </tr>
                        </thead>

                        <?php if($this->cart->total_items() == '0'):?>
                        <div class="alert alert-danger">
                            <p>Keranjang belanja Anda masih kosong.</p>
                        </div>
                        <?php endif;?>

                        <?php $i = 1; ?>
                        <?php $tot_diskon = 0 ;?>
                        <?php foreach($this->cart->contents() as $item ):?>
                        <?php $produk = $this->SloginUser_model->GetBarangById($item['id']);?>

                        <tbody>

                        <tr>
                            <th scope="row" style="width: fit-content;"><?= $i ;?></th>
                            <td>
                                <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . $produk['gambar_produk'] ;?>" width="120px" height="80" class="float-left">
                                <h6><?= $item['name'];?></h6>
                                <p>
                                <?php if ($produk['diskon'] == 'Ada') : ?>
                                    <?= "Rp " . number_format(html_escape($produk['harga_produk_ind']),0,'.','.') ;?> (<?= $produk['jumlah_diskon'] ;?>% Off )
                                <?php elseif ($produk['diskon'] == 'Tidak') : ?>
                                    Rp <?= number_format($produk['harga_produk_ind'],0,',','.') ;?>
                                <?php endif; ?>
                                </p>
                            </td>
                            <td>
                                <?php 
                                    echo form_input(array(
                                        'name' => $i . '[qty]',
                                        'value' => $item['qty'],
                                        'maxlength' => '3',
                                        'size' => '5',
                                        'type' => 'number',
                                        'min' => '0',
                                        'max' => $produk['stok_produk'],
                                        'class' => 'form-control'
                                    ));
                                ?>
                            </td>
                            <td>
                                <?php if ($produk['diskon'] == 'Ada') : ?>
                                    <!-- var diskon harga -->
                                    <?php $hitung1 = $produk['harga_produk_ind']*$produk['jumlah_diskon']/100 ;?>
                                    <?php $hitung2 = $produk['harga_produk_ind'] - $hitung1  ;?>
                                    <?php $diskon = $hitung2 * $item['qty'] ;?>
                                    <!--  -->
                                    <?= "Rp " . number_format($diskon,0,'.','.') ;?>
                                <?php elseif ($produk['diskon'] == 'Tidak') : ?>
                                    <?php $diskon = $produk['harga_produk_ind'] * $item['qty'] ;?>
                                    Rp <?= number_format($diskon,0,',','.') ;?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn tombol-produk" href="<?= base_url('SloginUser/Hapussb/'. $item['rowid']);?>">
                                <i class="fas fa-trash"></i>
                                Hapus
                                </a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                        <?php $tot_diskon = $tot_diskon + $diskon ;?>
                        <?php endforeach;?>
                        

                        <tr>
                            <td colspan="4" class="text-uppercase">Jumlah Sub total</td>
                            <td>Rp <?= number_format($tot_diskon,0,',','.') ;?></td>
                        </tr>
                        </tbody>
                    </table>
                    
                </div>
                <!-- akhir kolom kiri tabel cart -->

            </div>
        </div>
    </div>
    <!-- AKHIR TABEL CART -->



    <?php if($this->cart->total_items() == '0'):?>
    <!-- AKSI CART SAAT CART KOSONG-->
    <div class="tombol-aksi-cart mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-6 d-flex justify-content-start">
                <!-- tidak ada form close -->
                <?= form_close(); ?>
                    <button class="btn tombol-produk mr-3" onclick="alert('Keranjang belanja Anda masih kosong.')">
                        <i class="fas fa-edit"></i>
                        Update Keranjang
                    </button>

                    <button class="btn tombol-detail-produk" onclick="alert('Keranjang belanja Anda masih kosong.')">
                        <i class="fas fa-trash"></i>
                        Keranjang</button>
                </div>
                <div class="col-6 col-md-6 d-flex justify-content-end">
                    <button class="btn tombol-produk" style="width: fit-content;" onclick="alert('Keranjang belanja Anda masih kosong.')">
                        Lanjutkan Pesanan
                        <i class="fas fa-forward"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR AKSI CART -->
    <?php elseif($this->cart->total_items() != '0'):?>
    <!-- AKSI CART SAAT CART TIDAK KOSONG-->
    <div class="tombol-aksi-cart mb-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-6 d-flex justify-content-start">
                    <button type="submit" class="btn tombol-produk mr-3">
                        <i class="fas fa-edit"></i>
                        Update Keranjang
                    </button>
                    <?= form_close(); ?>

                    <a href="<?= base_url();?>SloginUser/HapusKeranjang" class="btn tombol-detail-produk">
                        <i class="fas fa-trash"></i>
                        Keranjang</a>
                </div>
                <div class="col-6 col-md-6 d-flex justify-content-end">
                    <a href="<?= base_url();?>SloginUser/FormPemesanan" class="btn tombol-produk" style="width: fit-content;">
                        Lanjutkan Pesanan
                        <i class="fas fa-forward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR AKSI CART -->
    <?php endif;?>