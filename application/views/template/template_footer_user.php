<!-- section footer -->
<footer>
        <div class="container">
            <div class="row justify-content-around">

                <div class="col-md-3">
                    <h5 class="logo-footer">Hubungi Kami</h5>
                    <hr>
                    <p><i class="fab fa-whatsapp"></i> : +62 896 5363 2375</p>
                </div>

                <div class="col-md-3">
                    <h5 class="aboutus-footer">Lokasi</h5>
                    <hr>
                    <p>Alamat : Jalan Raya Maospati – Solo Dusun Butuh RT 34 RW 13 Desa Banaran Kecamatan Sambungmacan Kabupaten Sragen Jawa Tengah 57253</p>
                </div>

                <div class="col-md-3">
                    <h5>Social Media</h5>
                    <hr>
                    <a href="#"><i class="fab fa-instagram"> : @griyarempahruwah </i></a>
                    <!-- <ul class="social-media-footer">
                        <li>
                            <a href="#"><i class="fab fa-instagram"> @Griya Rempah</i></a>
                        </li>
                    </ul> -->
                </div>

            </div>

            <div class="row pt-4">
                <div class="col">
                    <p>Dibuat dengan <i class="fas fa-heart" style="color: red;"></i> oleh Griya Rempah 2021.</p>
                </div>
            </div>

        </div>
    </footer>
    <!-- akhir section footer --> 

    <!-- MODAL search -->
    <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mencari sesuatu?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
                <!-- ISI MODAL -->
                <?= form_open(); ?>
                    <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cari produk" name="keyword">
                    </div>
                    <button type="submit" class="btn tombol-semua-produk">
                        <i class="fas fa-search"></i>
                        Cari
                    </button>
                <?= form_close(); ?>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
        </div>
    </div>
    <!-- AKHIR MODAL -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url(); ?>assets/griyarempah/js/jquery-3.2.1.min.js"></script>
<script src="<?= base_url(); ?>assets/griyarempah/js/popper.min.js"></script>
<script src="<?= base_url(); ?>assets/griyarempah/js/bootstrap.min.js"></script>
<!-- Griya JS -->
<script src="<?= base_url(); ?>assets/griyarempah/js/script.js"></script>
<!-- lightbox JS -->
<script src="<?= base_url(); ?>assets/griyarempah/lightbox/dist/js/lightbox.js"></script>
<script>
    lightbox.option({
    'resizeDuration': 400,
    'wrapAround': true
    })
</script>
</body>
</html>