    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><span>Warisan</span> alami <br> kekayaan <span>nusantara</span></h1>
            <a href="<?= base_url();?>Blogin/TokoSemua" class="btn tombol">Belanja sekarang</a>
        </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Section Kategori -->
    <div class="container">
        <div class="row kategori">
            <div class="col">
                <h3>Kategori</h3>
            </div>
        </div>

        <!-- CARD KATEgORI -->
        <div class="row justify-content-center panel-kategori">
            
            <?php foreach ($kategori as $k) : ?>
                <a href="<?= base_url(); ?>Blogin/Kategori/<?= $k['nama_kategori']; ?>" class="col-4 col-sm-6 card-kategori text-center">
                <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($k['gambar_kategori']); ?>" class="float-left" height="55px">
                <h4><?= $k['nama_kategori'];?></h4>
            </a>
            <?php endforeach; ?>

        </div>
        <!-- Akhir Card kategori -->

    </div>
    <!-- Akhir Section Kategori -->

    <!-- Section Produk Baru -->
    <div class="section-produk">
    <div class="container">

        <div class="row text-center mb-3">
            <div class="col">
                <h3>Produk Baru</h3>
                <hr>
            </div>
        </div>

        <div class="row mb-4 justify-content-start">

            <?php foreach ($produk as $p) : ?>
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
            </div>
            <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <div class="row justify-content-center">
            <a href="<?= base_url();?>Blogin/TokoSemua" class="btn tombol-semua-produk">Lihat semua >></a>
        </div>
    
    </div>
    </div>
    <!-- Akhir Produk Baru -->


    <!-- testimoni -->
    <div class="slider-area">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    
                    <!-- INDIKATOR -->
                    <?php $i = 1;?>
                    <?php foreach ($testimoni as $t) : ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i;?>"></li>
                    <?php $i++ ;?>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="img-area">
                            <img src="<?= base_url('assets/griyarempah/img/testimoni-default-image.png');?>" alt="1">
                        </div>
                        <div class="carousel-caption">
                            <h3>Sella Alaida Syifa</h3>
                            <p>" Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque sit esse tenetur dolorem saepe dolore, sequi laudantium accusantium quo beatae, facere molestiae deleniti iusto cumque. "</p>
                        </div>
                    </div>
                    
                    <?php foreach ($testimoni as $t) : ?>
                    <div class="carousel-item">
                        <div class="img-area">
                            <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($t['gambar_testimoni']); ?>" alt="1">
                        </div>
                        <div class="carousel-caption">
                            <h3><?= $t['nama_testimoni'];?></h3>
                            <p>" <?= $t['kalimat_testimoni'];?> "</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>


<!-- UN WA -->
<a href="https://api.whatsapp.com/send/?phone=6289653632375&text=" target="_blank"> 
    <div class="tf-wa" style="color: #fff;">
        <i class="fab fa-whatsapp" style="font-size: 24px;"></i> whatsapp Kami
    </div>
</a>