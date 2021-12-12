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
        <h1 class="h3 mb-0 text-gray-800">Keranjang Belanja Anda</h1>
    </div>

    <hr>


    <?php if ( $this->session->flashdata('msg-limit') ) : ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('msg-limit'); ?> .
                </div>
            </div>
        </div>
    <?php endif; ?>


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
                        <p>
                            Keranjang belanja Anda masih kosong. 
                            <a href="<?= base_url();?>Blogin"> Belanja sekarang.</a>
                        </p>
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
                            <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . $produk['gambar_produk'] ;?>" width="120px" height="80" class="float-left" style="margin-right: 10px;">
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
    <!-- akhir row -->

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
                    <button class="btn tombol-produk" style="background-color: #5D4954; color: #fff; height: fit-content;" onclick="alert('Keranjang belanja Anda masih kosong.')">
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
                    <a href="<?= base_url();?>SloginUser/FormPemesanan" class="btn tombol-produk" style="background-color: #5D4954; color: #fff; height: fit-content;">
                        Lanjutkan Pesanan
                        <i class="fas fa-forward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- AKHIR AKSI CART -->
    <?php endif;?>
        
</div>