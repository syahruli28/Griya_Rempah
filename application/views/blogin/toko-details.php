    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid jumten" style="background-image: url(<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($gambar_kategori['gambar_kategori']); ?>); background-size: cover;">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Detail Produk</h1>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Section Produk Baru -->
    <div class="section-produk" style="margin-top: -60px; background-color: #f0f0f0; padding-top: 100px;">
    <div class="container">

        <div class="row mb-4 justify-content-around">

            <div class="col-6 col-md-6">
                <a href="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($produk['gambar_produk']) ;?>" data-lightbox="<?=$produk['gambar_produk'];?>">
                    <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($produk['gambar_produk']); ?>" class="card-img" style="width: 90%;max-height: 320px;">
                </a>
            </div>

            <div class="col-6 col-md-4">
                <h3 style="text-transform: uppercase; font-weight: bold;"><?= $produk['nama_produk_ind'];?></h3>
                <hr>

                <?php if ($produk['diskon'] == 'Ada') : ?>
                    <h5 class="mb-3">Harga Diskon : <?= "Rp " . number_format(html_escape($produk['harga_produk_ind']*$produk['jumlah_diskon']/100 - $produk['harga_produk_ind']),0,'.','.') ;?></h5>
                    <h6 class="mb-4 text-muted">Harga Asli : <?= "Rp " . number_format(html_escape($produk['harga_produk_ind']),0,'.','.') ;?> (-<?= $produk['jumlah_diskon'] ;?>% ) </h6>

                <?php elseif ($produk['diskon'] == 'Tidak') : ?>
                    <h5 class="mb-3 text-muted">Harga : <?= "Rp " . number_format(html_escape($produk['harga_produk_ind']),0,'.','.') ;?></h5>

                <?php endif; ?>

                <p class="mb-3"> Jumlah Stok : <?= $produk['stok_produk'];?></p>
                <a href="<?= base_url();?>Sloginuser/TambahKeKeranjang/<?= $produk['id_produk'];?>" class="btn tombol-produk">Masukan 
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>

        </div>
    
    </div>
    </div>
    <!-- Akhir Produk Baru -->