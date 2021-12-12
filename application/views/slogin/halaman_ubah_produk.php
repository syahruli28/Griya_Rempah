<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_user');?></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url();?>Slogin/SettingLokasi">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Pengaturan Toko
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url();?>Auth/logout" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                </a>
            </div>
        </li>

    </ul>

    </nav>
    <!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Produk</h1>
        <a href="<?= base_url();?>Slogin/HalamanProduk" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #5D4954; color: #fff;">
        <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- form -->
    <div class="row">
        <div class="col-6">
        <?= form_open_multipart(); ?>

        <input type="hidden" name="id" id="id" value="<?= $produk['id_produk']; ?>">

            <div class="form-group">
                <label for="npind">Nama Produk (Indonesia)</label>
                <input type="text" class="form-control" name="npind" id="npind" value="<?= $produk['nama_produk_ind']; ?>">
                <small class="form-text text-danger"><?= form_error('npind'); ?></small>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="npen">Nama Produk (English)</label>
                <input type="text" class="form-control" name="npen" id="npen" value="<?= $produk['nama_produk_en']; ?>">
                <small class="form-text text-danger"><?= form_error('npen'); ?></small>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="hprp">Harga Produk (Rupiah)</label>
                <input type="text" class="form-control" name="hprp" id="hprp" value="<?= $produk['harga_produk_ind']; ?>">
                <small class="form-text text-danger"><?= form_error('hprp'); ?></small>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="hpusd">Harga Produk (USD)</label>
                <input type="text" class="form-control" name="hpusd" id="hpusd" value="<?= $produk['harga_produk_en']; ?>">
                <small class="form-text text-danger"><?= form_error('hpusd'); ?></small>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="diskon">Diskon</label>
                <select id="diskon" name="diskon" class="form-control">
                    <?php foreach ( $diskon as $d ) : ?>
							
						<?php if ( $d == $produk['diskon'] ) : ?>
							<option value="<?= $d; ?>" selected><?= $d; ?></option>
						<?php else : ?>
							<option value="<?= $d; ?>"><?= $d; ?></option>
						<?php endif; ?>

					<?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="jumdis">Jumlah Diskon</label>
                <input type="number" class="form-control" name="jumdis" id="jumdis" value="<?= $produk['jumlah_diskon']; ?>">
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" class="form-control">
                    <?php foreach ( $kategori as $k ) : ?>
							
						<?php if ( $produk['id_kategori'] == $k['id_kategori'] ) : ?>
							<option value="<?= $k['id_kategori']; ?>" selected><?= $k['nama_kategori']; ?></option>
						<?php else : ?>
							<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
						<?php endif; ?>
							
					<?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="beratproduk">Berat Produk</label>
                <input type="text" class="form-control" name="beratproduk" id="beratproduk" value="<?= $produk['berat_produk']; ?>">
                <small class="form-text text-danger"><?= form_error('beratproduk'); ?></small>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="gambarproduk">Pilih Gambar Produk</label>
                <input type="file" class="form-control-file" name="gambarproduk" id="gambarproduk">
                <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . $produk['gambar_produk']; ?>" class="img-thumbnail">
                <small class="form-text text-danger"><?= form_error('gambarproduk'); ?></small>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="stokproduk">Stok Produk</label>
                <input type="text" class="form-control" name="stokproduk" id="stokproduk" value="<?= $produk['stok_produk']; ?>">
                <small class="form-text text-danger"><?= form_error('stokproduk'); ?></small>
            </div>  
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button type="submit" class="btn mt-2 mb-5" style="background-color: #5D4954; color: #fff;">
            Ubah Produk</button>
            <?= form_close(); ?>
        </div>
    </div>
    

</div>