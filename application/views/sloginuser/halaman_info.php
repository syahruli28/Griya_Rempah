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

    <h6 style="margin-top: 5px;">Selamat Datang, <?= $profil['nama_user'] ;?></h6>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $profil['nama_user'] ;?></span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Info Belanja / Pembayaran</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-8">
            <h4>Info Belanja</h4>
            <hr>
            <small>1. Alur untuk belanja pada situs <strong>griyarempah.com</strong>, Pertama Anda harus memiliki akun terlebih dahulu dengan mengklik tombol <a href="<?= base_url();?>Auth">Log in</a> pada bagian kanan atas situs <strong>griyarempah.com</strong>. </small><br>
            <small>2. Setelah Anda Log In / Mendaftar pada situs <strong>griyarempah.com</strong> maka Anda sudah dapat berbelanja pada situs <strong>griyarempah.com</strong>.</small>

            <br><br>
            <hr>
            <h4>Info Pembayaran</h4>
            <hr>
            <small>1. Setelah Anda mengisi form pemesanan, maka data pemesanan Anda telah kami simpan pada database Kami.</small><br>
            <small>2. Data pesanan Anda akan tersimpan dalam waktu kurang lebih 2-3 hari pada database Kami, bila pada rentang waktu itu Anda belum membayar maka data pesanan Anda akan Kami <strong>hapus</strong>.</small><br>
            <small>3. Untuk membayar pesanan Anda silahkan lakukan transfer ke salah satu Rekening kami dengan membayar sesuai dengan jumlah total tagihan pesanan Anda. (No. Rekening pembayaran dapat dilihat pada halaman <a href="<?= base_url();?>SloginUser/PesananSaya">Pesanan Saya</a>, klik pada tombol <strong>"No. Rekening Pembayaran"</strong>)</small><br>
            <small>4. Setelah Anda mentransfer tagihan pesanan Anda sesuai dengan jumlah tagihan, silahkan untuk menghubungi Admin kami melalui <strong>WhatsApp</strong> dengan melampirkan <strong>bukti transfer/bayar</strong>, <strong>No. order data pesanan Anda (dapat dilihat pada halaman <a href="<?= base_url();?>SloginUser/PesananSaya">Pesanan Saya</a>)</strong>, <strong>Nama Bank</strong>, <strong>No. Rekening</strong> dan <strong>Rekening a.n.</strong> pada saat mentransfer tagihan Anda. (kami sudah menyediakan tombol pembayaran pada halaman <a href="<?= base_url();?>SloginUser/PesananSaya">Pesanan Saya</a>)</small><br>
            <small>5. Setelah Admin kami menkonfirmasi pembayaran Anda, maka Admin Kami akan memproses Pesanan Anda (Info proses pesanan dapat dilihat di halaman <a href="<?= base_url();?>SloginUser/PesananSaya">Pesanan Saya</a>). </small>
        </div>
        <div class="col-md-4 text-center">
            <h4>Info No. Admin</h4>
            <hr>
            <small><i class="fab fa-whatsapp" style="font-size: 24px;"></i> : +62 896 5363 2375</small>
            <!-- <br><br>
            <h4>Info No. Rekening</h4>
            <hr>
            <small>1233-XXXXXX-XXXX (Bank XXX)</small><br>
            <small>1233-XXXXXX-XXXX (Bank XXX)</small><br>
            <small>1233-XXXXXX-XXXX (Bank XXX)</small> -->
        </div>
    </div>
        
</div>