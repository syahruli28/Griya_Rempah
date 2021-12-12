    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid jumten" style="background-image: url(<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($gambar_kategori['gambar_kategori']); ?>); background-size: cover;background-position: center;">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Produk kategori : <?= $judul_kategori;?></h1>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Section Produk Baru -->
    <div class="section-produk" style="margin-top: -60px; background-color: #f0f0f0; padding-top: 100px;">
    <div class="container">

        <div class="row mb-4 justify-content-start">

            <!-- cek untuk variabel data ada/tidak -->
            <?php $ta = 0;?>
            <?php $a = 0;?>
            <?php foreach ($kategori as $p) : ?>
            <?php if ($p['stok_produk'] != 0) : ?>
            <div class="col-6 col-md-3">
                <div class="card mb-4">
                    <img class="card-img-top" src="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($p['gambar_produk']); ?>" alt="Card image cap" height="170px">
                    <div class="card-body">
                    <?php if ($p['diskon'] == 'Ada') : ?>
                        <div class="label-diskon">
                            <h6> -<?= $p['jumlah_diskon'];?>% </h6>
                        </div>
                        <div class="harga-diskon">
                            -----------  <?= "Rp " . number_format(html_escape($p['harga_produk_ind']*$p['jumlah_diskon']/100 - $p['harga_produk_ind']),0,'.','.') ;?>
                        </div>
                    <?php endif; ?>
                    <h5 class="card-title" style="font-weight: bold;"><?= $p['nama_produk_ind'] ;?></h5>
                    <p class="card-text"><?= "Rp " . number_format(html_escape($p['harga_produk_ind']),0,'.','.') ;?></p>
                    <a href="<?= base_url();?>Sloginuser/TambahKeKeranjang/<?= $p['id_produk'];?>" class="btn tombol-produk">Masukan 
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                    <a href="<?= base_url();?>Blogin/DetailProduk/<?= $p['nama_produk_ind']; ?>" class="btn tombol-detail-produk">Detail Produk</a>
                    </div>
                </div>
            <?php  $a = $a + 1;?>
            </div>
            <?php elseif ($p['stok_produk'] == 0) :?>
                <?php  $ta = $ta + 1;?>
            
            <?php endif; ?>
            <?php endforeach; ?>

            <?php if ( !empty($ta) and empty($a)) : ?>
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    Maaf, Kategori sedang kosong. <a href="<?= base_url();?>Blogin"> Kembali</a>
                </div>
            </div>
            <?php endif; ?>

        </div>
    
    </div>
    </div>
    <!-- Akhir Produk Baru -->