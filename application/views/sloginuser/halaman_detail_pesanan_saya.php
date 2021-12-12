<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    @media print {
        .print a, .print button, footer{
            display: none;
        }
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

<div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h4 class="berita-text">Form Pesanan Saya No. Order : <?= $pesanan['no_order'] ;?> </h4>
                <hr>
            </div>
        </div>

        <!-- TABEL CART -->
    <div class="section-tabel-cart mt-2 mb-5">
        <!-- <div class="container"> -->

            <div class="row">

                <!-- kolom kiri tabel cart -->
                <div class="col">
                    <table class="table">
                        <thead class="thead" style="background-color: #5D4954; color: #fff;">
                        <tr>
                            <th scope="col" style="width: 40px;">No.</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col" style="width:fit-content;">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                        </thead>

                        <?php $i = 1; ?>
                        <?php foreach($detail_pesanan as $dp ):?>

                        <tbody>

                        <tr>
                        <!-- hanya tampilkan yang sesuai no order -->
                            <?php if($dp['no_order'] == $pesanan['no_order'] ) : ?>
                                <th scope="row" style="width: fit-content;"><?= $i ;?></th>
                                <td>
                                    <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . html_escape($dp['gambar_produk']); ?>" width="120px" height="80">
                                </td>
                                <td>
                                        <h6><?= $dp['nama_produk_ind'];?></h6>
                                </td>
                                <td>
                                    <?= $dp['qty'];?>
                                </td>
                            </tr>

                            <?php $i++; ?>
                            <?php endif; ?>
                        <?php endforeach;?>

                        </tbody>
                    </table>
                    
                </div>
                <!-- akhir kolom kiri tabel cart -->

            </div>
        <!-- </div> -->
    </div>
    <!-- AKHIR TABEL CART -->


        <div class="row mt-3">
            <div class="col-8">
                <div class="row">

                <input type="hidden" name="noorder" id="noorder" value="<?= $pesanan['no_order']; ?>">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" value="<?= $pesanan['nama_penerima'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="no_penerima">No. HP Penerima</label>
                            <input type="number" class="form-control" name="no_penerima" id="no_penerima" value="<?= $pesanan['no_hp_penerima'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <input id="provinsi" name="provinsi" class="form-control" value="<?= $pesanan['provinsi'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kota">Kota/Kabupaten</label>
                            <input id="kota" name="kota" class="form-control" value="<?= $pesanan['kota'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ekspedisi">Ekspedisi</label>
                            <input id="ekspedisi" name="ekspedisi" class="form-control" value="<?= $pesanan['expedisi'];?>" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <input id="paket" name="paket" class="form-control" value="<?= $pesanan['paket'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="alamat_penerima">Alamat Rumah</label>
                            <textarea name="alamat_penerima" id="alamat_penerima" cols="30" rows="5" class="form-control" readonly>
                                <?= $pesanan['alamat'];?>
                            </textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kodepos">Kode Pos</label>
                            <input type="number" class="form-control" name="kodepos" id="kodepos" value="<?= $pesanan['kode_pos'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="buktibayar">Gambar Bukti Transaksi</label>
                            <img src="<?= base_url('assets/griyarempah/img/transaksi/') . $pesanan['bukti_bayar']; ?>" class="img-thumbnail">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="atasnama">Rekening atas nama</label>
                            <input id="atasnama" name="atasnama" class="form-control" value="<?= $pesanan['atas_nama'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namabank">Nama Bank</label>
                            <input id="namabank" name="namabank" class="form-control" value="<?= $pesanan['nama_bank'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="norek">No. Rekening</label>
                            <input id="norek" name="norek" class="form-control" value="<?= $pesanan['no_rek'];?>" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="noresi">No. Resi</label>
                            <input id="noresi" name="noresi" class="form-control" value="<?= $pesanan['no_resi'];?>" readonly>
                        </div>
                    </div>
                                            
                </div>
                
            </div>

            
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Subtotal : </th>
                            <td>Rp. <?= number_format($pesanan['grand_total'],0,',','.') ;?></td>
                        </tr>
                        <tr>
                            <th>Ongkir : </th>
                            <td><?= number_format($pesanan['ongkir'],0,',','.');?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar : </th>
                            <td><?= number_format($pesanan['total_bayar'],0,',','.');?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- <div class="col-md-4">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div> -->
        </div>

        <div class="row mb-5 mt-5">
            <div class="col-md-12 print">
                <div>
                    <a href="<?= base_url();?>SloginUser/PesananSaya" class="btn btn-sm tombol-detail-produk">Kembali</a>
                    <button class="btn btn-sm tombol-produk" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                </div>
            </div>
        </div>


</div>