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

    <?php if ( $this->session->flashdata('msg-success') ) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Lokasi Toko <strong>berhasil</strong> <?= $this->session->flashdata('msg-success'); ?> 
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
        <h1 class="h3 mb-0 text-gray-800">Setting Lokasi Toko</h1>
        <a href="<?= base_url();?>Slogin/HalamanKategori" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style="background-color: #5D4954; color: #fff;">
        <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- form -->
    <div class="row">
        <div class="col-6">
        <?= form_open(); ?>
        <?php foreach($toko as $t ):?>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select id="provinsi" name="provinsi" class="form-control">
                </select>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="kotakabupaten">Kota / Kabupaten</label>
                <select id="kotakabupaten" name="kotakabupaten" class="form-control">
                    <option value="<?= $t['kota_kabupaten'];?>"><?= $t['kota_kabupaten'];?></option>
                </select>
                <small class="form-text text-danger"><?= form_error('kotakabupaten'); ?></small>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="submit" class="btn mt-2 mb-5" style="background-color: #5D4954; color: #fff;">
            Ubah Lokasi Toko</button>
            <?php endforeach;?>
            <?= form_close(); ?>
        </div>
    </div>

</div>

