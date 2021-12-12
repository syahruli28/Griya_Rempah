<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favico -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url();?>assets/griyarempah/img/griyarempah.png">

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
                <h4 class="berita-text">Form Pemesanan</h4>
                <hr>
            </div>
        </div>

        <!-- TABEL CART -->
    <div class="section-tabel-cart mt-5 mb-5">
        <!-- <div class="container"> -->

            <div class="row">

                <!-- kolom kiri tabel cart -->
                <div class="col">
                    <table class="table">
                        <thead class="thead" style="background-color: #5D4954; color: #fff;">
                        <tr>
                            <th scope="col" style="width: 40px;">No.</th>
                            <th scope="col" style="width:fit-content;">Deskripsi Barang</th>
                            <th scope="col" width="90px">Jumlah</th>
                            <th scope="col">Sub Harga</th>
                        </tr>
                        </thead>

                        <?php if($this->cart->total_items() == '0'):?>
                        <div class="alert alert-danger">
                            <p>Keranjang belanja Anda masih kosong.</p>
                        </div>
                        <?php endif;?>

                        <?php $i = 1; ?>
                        <?php $tot_diskon = 0 ;?>
                        <?php $tot_berat = 0 ;?>
                        <?php foreach($this->cart->contents() as $item ):?>
                        <?php $produk = $this->SloginUser_model->GetBarangById($item['id']);?>
                        <?php $berat = $item['qty'] * $produk['berat_produk'];?>
                        <?php $tot_berat = $tot_berat + $berat ;?>

                        <tbody>

                        <tr>
                            <th scope="row" style="width: fit-content;"><?= $i ;?></th>
                            <td>
                                <img src="<?= base_url('assets/griyarempah/img/gambarweb/') . $produk['gambar_produk'] ;?>" width="120px" height="80" class="float-left">
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
                                <?= $item['qty'] ;?>
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
                        </tr>

                        <?php $i++; ?>
                        <?php $tot_diskon = $tot_diskon + $diskon ;?>
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
            <?= form_open('SloginUser/FormPemesanan');?>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima">
                            <small class="form-text text-danger"><?= form_error('nama_penerima'); ?></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="no_penerima">No. HP Penerima</label>
                            <input type="number" class="form-control" name="no_penerima" id="no_penerima">
                            <small class="form-text text-danger"><?= form_error('no_penerima'); ?></small>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select id="provinsi" name="provinsi" class="form-control">
                            </select>
                            <small class="form-text text-danger"><?= form_error('provinsi'); ?></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kota">Kota/Kabupaten</label>
                            <select id="kota" name="kota" class="form-control">
                            </select>
                            <small class="form-text text-danger"><?= form_error('kota'); ?></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ekspedisi">Ekspedisi</label>
                            <select id="ekspedisi" name="ekspedisi" class="form-control">
                            </select>
                            <small class="form-text text-danger"><?= form_error('ekspedisi'); ?></small>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <select id="paket" name="paket" class="form-control">
                            </select>
                            <small class="form-text text-danger"><?= form_error('paket'); ?></small>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="alamat_penerima">Alamat Rumah</label>
                            <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima">
                            <small class="form-text text-danger"><?= form_error('alamat_penerima'); ?></small>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kodepos">Kode Pos</label>
                            <input type="number" class="form-control" name="kodepos" id="kodepos" required>
                        </div>
                    </div>

                    <?php $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)) ;?>
                    <input name="no_order" value="<?= $no_order;?>" hidden>
                    <input name="estimasi" hidden>
                    <input name="ongkir" hidden>
                    <input name="berat" value="<?= $tot_berat;?>" hidden>
                    <input name="grand_total" value="<?= $tot_diskon;?>" hidden> 
                    <input name="total_bayar" hidden>
                    <?php
                        $i=1;
                        foreach($this->cart->contents() as $item){
                            echo form_hidden('qty' . $i++, $item['qty']);
                        }
                    ;?>
                                            
                </div>
                
            </div>

            
            <div class="col-4">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Subtotal : </th>
                            <td>Rp. <?= number_format($tot_diskon,0,',','.') ;?></td>
                        </tr>
                        <tr>
                            <th>Ongkir : </th>
                            <td><label id="ongkir"> - </label></td>
                        </tr>
                        <tr>
                            <th>Total Bayar : </th>
                            <td><label id="total_bayar"> - </label></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- <div class="col-md-4">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div> -->
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div align="right">
                    <a href="<?= base_url();?>SloginUser" class="btn btn-sm tombol-detail-produk">Kembali ke keranjang belanja</a>
                    <button type="submit" class="btn btn-sm tombol-produk">Checkout</button>
                    <?= form_close();?>
                </div>
            </div>
        </div>


</div>

<script type="text/javascript" src="<?= base_url();?>assets/griyarempah/js/jquery-3.5.1.min.js"></script>

<!-- Griya JS -->
<script type="text/javascript" src="<?= base_url(); ?>assets/griyarempah/js/script.js"></script>
<script>
    
    $(document).ready(function(){

        // memanggil data provinsi (API Rajaongkir)
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi');?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        // lakukan perubahan setiap milih provinsi
        // memanggil data kota (API Rajaongkir)
        $("select[name=provinsi]").on("change", function(){
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota');?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota){
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        // lakukan perubahan setiap milih kota
        $("select[name=kota]").on("change", function(){
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/ekspedisi');?>",
                
                success: function(hasil_ekspedisi){
                    // console.log(hasil_kota);
                    $("select[name=ekspedisi]").html(hasil_ekspedisi);
                }
            });
        });

        // lakukan perubahan setiap milih ekspedisi
        $("select[name=ekspedisi]").on("change", function(){
            // dapatkan nama ekspedisi terpilih
            var namaEkspedisi = $("select[name=ekspedisi]").val();
            // dapatkan id kota terpilih
            var idKotaTerpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            // dapatkan total berat
            var totalBerat = <?= $tot_berat;?>;
            // alert(totalBerat);
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket');?>",
                // kirimkan datanya (berat, idkota dll)
                data: 'dataekspedisi='+namaEkspedisi+'&datakota='+idKotaTerpilih+'&databerat='+totalBerat,
                success: function(hasil_paket){
                    // console.log(hasil_kota);
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        // lakukan perubahan setiap milih paket
        $("select[name=paket]").on("change", function(){
            // ambil total ongkir dari controller rajaongkir
            var hargaOngkir = $("option:selected", this).attr('ongkir');
            // format rupiah
            var reverse = hargaOngkir.toString().split('').reverse().join(''),
                rp_ongkir = reverse.match(/\d{1,3}/g);
                rp_ongkir = rp_ongkir.join(',').split('').reverse().join('');
            // ubah nilai id ongkir
            $("#ongkir").html("Rp. "+ rp_ongkir)

            // buat variabel total bayar dari penjumlahan harga ongkir dan harga belanja
            var toBayar = parseInt(hargaOngkir) + parseInt(<?= $tot_diskon;?>);
            // format rupiah
            var reverse2 = toBayar.toString().split('').reverse().join(''),
                rp_bayar = reverse2.match(/\d{1,3}/g);
                rp_bayar = rp_bayar.join(',').split('').reverse().join('');
            // ubah nilai id ongkir
            $("#total_bayar").html("Rp. "+ rp_bayar);

            // estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(hargaOngkir);
            $("input[name=total_bayar]").val(toBayar);
        });

    });
</script>