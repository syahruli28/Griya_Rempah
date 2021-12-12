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

    <!-- Topbar Search -->
    <?php $attr = array('class' => 'd-none.d-sm-inline-block.form-inline.mr-auto.ml-md-3 my-2.my-md-0.mw-100.navbar-search') ;?>
    <?= form_open('', $attr); ?>
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" name="keyword">
            <div class="input-group-append">
                <button class="btn" type="submit" style="background-color: #5D4954; color: #fff;">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    <?= form_close(); ?>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <?php $attr = array('class' => 'form-inline.mr-auto.w-100.navbar-search') ;?>
                <?= form_open('', $attr); ?>
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <?= form_close(); ?>
            </div>
        </li>

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


<!-- ISI -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ( $this->session->flashdata('msg-success') ) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data produk <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> 
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Produk</h1>
        <a href="<?= base_url();?>Slogin/TambahProduk" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #5D4954; color: #fff;">
        <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

    <!-- Main Content -->
    <div class="row">

        <!-- kolom kiri tabel cart -->
        <div class="col">
                    <table class="table">
                        <thead class="thead" style="background-color: #5D4954; color: #fff; font-size: 12px;">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Kategori Produk</th>
                            <th scope="col">Diskon</th>
                            <th scope="col">Harga Diskon</th>
                            <th scope="col">Stok Produk</th>
                            <th scope="col">Berat Produk</th>
                            <th scope="col">Tanggal Upload</th>
                            <th scope="col">Opsi</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                        <tr>
                        <?php $i= 1; ?>
                        <?php foreach( $produk as $p ): ?>
                            <th scope="row" style="width: fit-content;"><?= $i ;?></th>
                            <td>
                            <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($p['gambar_produk']); ?>" width="120" height="90">
                            </td>
                            <td><?= html_escape($p['nama_produk_ind']) ;?></td>
                            <td><?= "Rp " . number_format(html_escape($p['harga_produk_ind']),0,'.','.') ;?></td>
                            <td><?= html_escape($p['nama_kategori']) ;?> </td>
                            <td><?= html_escape($p['diskon']) ;?> </td>
                            <td><?= html_escape($p['jumlah_diskon']) ;?> </td>
                            <td><?= html_escape($p['stok_produk']) ;?> </td>
                            <td><?= html_escape($p['berat_produk']) ;?> </td>
                            <td><?= html_escape($p['tanggal_upload']) ;?> </td>
                            <td style="font-size: 12px;">
                                <a href="<?= base_url(); ?>Slogin/UbahDataProduk/<?= $p['id_produk']; ?>" class="btn">
                                    <i class="fas fa-edit"></i>
                                Edit</a> | 
                                <a href="<?= base_url(); ?>Slogin/HapusDataProduk/<?= $p['id_produk']; ?>" onclick="return confirm('Apa anda yakin ?');" class="btn tombol-detail-produk">
                                    <i class="fas fa-trash"></i>
                                Hapus</a>
                            </td>
                        </tr>
                        <?php $i++ ; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php if ( empty($produk) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data produk kosong.
                        </div>
                    <?php endif; ?>
                    
                </div>
                <!-- akhir kolom kiri tabel cart -->

    </div>
    <!-- End Main Content -->

</div>
<!-- End Page Content -->