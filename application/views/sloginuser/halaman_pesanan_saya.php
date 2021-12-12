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
                            <button class="btn btn-primary" type="submit">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $profil['nama_user'] ;?> </span>
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


<!-- ISI -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesanan Saya</h1>
        <button type="button" class="btn" data-toggle="modal" data-target="#modalRek" style="background-color: #5D4954;color:#fff;">
        <i class="far fa-credit-card"></i> No. Rekening Pembayaran
        </button>
    </div>

    <?php if ( $this->session->flashdata('msg-success') ) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('msg-success'); ?> .
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div class="row">

        <!-- kolom kiri tabel cart -->
        <div class="col">
                    <table class="table">
                        <thead class="thead" style="background-color: #5D4954; color: #fff; font-size: 16px;">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">No. Order</th>
                            <th scope="col">Nama Penerima</th>
                            <th scope="col">Rincian Biaya</th>
                            <th scope="col">Status Pesanan</th>
                            <th scope="col">Opsi</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                        <tr>
                        <?php $i= 1; ?>
                        <?php foreach( $pesanan as $p ): ?>
                            <th scope="row" style="width: fit-content;"><?= $i ;?></th>
                            <td><?= html_escape($p['no_order']) ;?></td>
                            <td><?= html_escape($p['nama_penerima']) ;?></td>
                            <td>
                                <p> Grand total : <?= "Rp " . number_format(html_escape($p['grand_total']),0,'.','.') ;?></p>    
                                <p> Ongkir : <?= "Rp " . number_format(html_escape($p['ongkir']),0,'.','.') ;?>    </p>
                                <p> Total : <?= "Rp " . number_format(html_escape($p['total_bayar']),0,'.','.') ;?>   </p> 
                            </td>
                            <td>
                                <?php if($p['status_bayar'] == 0 ) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Belum bayar
                                    </div>
                                <?php elseif($p['status_bayar'] == 1 and $p['status_order'] == 0 ) : ?>
                                    <div class="alert alert-warning" role="alert">
                                        Sudah bayar, Dalam proses packing
                                    </div>
                                <?php elseif($p['status_bayar'] == 1 and $p['status_order'] == 1 ) : ?>
                                    <div class="alert alert-success" role="alert">
                                        Dalam proses pengiriman/Selesai
                                    </div>
                                <?php endif;?>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>SloginUser/DetailPesananSaya/<?= $p['no_order']; ?>" class="btn">
                                    <i class="fas fa-check-square"></i>
                                Detail</a>
                            </td>
                        </tr>
                        <?php $i++ ; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php if ( empty($pesanan) ) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data Pesanan kosong. <a href="<?= base_url(); ?>Blogin/TokoSemua"> belanja sekarang.</a>
                        </div>
                    <?php endif; ?>
                    
                </div>
                <!-- akhir kolom kiri tabel cart -->

    </div>
    <!-- End Main Content -->

</div>
<!-- End Page Content -->

<!-- Modal -->
<div class="modal fade" id="modalRek" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">No. Rekening Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #5D4954;color:#fff;">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- UN WA -->
<a href="https://api.whatsapp.com/send/?phone=6289653632375&text=No.%20Order%20%20%20%20%3A%0ANama%20Bank%20%20%20%20%3A%0ANo.%20Rekening%20%3A%0ARekening%20a.n.%20%3A" target="_blank"> 
    <div class="tf-wa" style="color: #fff;">
        <i class="fab fa-whatsapp" style="font-size: 24px;"></i> Konfirmasi Pembayaran
    </div>
</a>