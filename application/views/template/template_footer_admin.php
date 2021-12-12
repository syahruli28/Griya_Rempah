<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apa Anda yakin untuk Logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-primary" href="<?= base_url();?>Auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/vendor/chart.js/Chart.min.js"></script>
    
    <!-- Page level custom scripts -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/js/demo/chart-area-demo.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/sbadmin2/js/demo/chart-pie-demo.js"></script>
    
    <script type="text/javascript" src="<?= base_url();?>assets/griyarempah/js/jquery-3.5.1.min.js"></script>

    <!-- Griya JS -->
    <script type="text/javascript" src="<?= base_url(); ?>assets/griyarempah/js/script.js"></script>

    <script>
    // rajaongir : lokasi

    "use strict";
    $(document).ready(function(){
        // memanggil data provinsi (API Rajaongkir)
        $.ajax({
            type: "POST",
            url: "<?= base_url('Rajaongkir/provinsi');?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        // memanggil data kota (API Rajaongkir)
        $("select[name=provinsi]").on("change", function(){
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                // CONTROLLER KOTA SUDAH DIRUBAH
                url: "<?= base_url('Rajaongkir/ubahkota');?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota){
                    // console.log(hasil_kota);
                    $("select[name=kotakabupaten]").html(hasil_kota);
                }
            });
        });
    });
    </script>

</body>

</html>