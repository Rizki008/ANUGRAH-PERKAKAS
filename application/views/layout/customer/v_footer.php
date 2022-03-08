<div class="footer-wrap pd-20 mb-20 card-box">
    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
</div>
</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/layout-settings.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/dashboard.js"></script>
<!-- switchery js -->
<script src="<?= base_url() ?>deskapp-master/src/plugins/switchery/switchery.min.js"></script>
<!-- bootstrap-tagsinput js -->
<script src="<?= base_url() ?>deskapp-master/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<!-- bootstrap-touchspin js -->
<script src="<?= base_url() ?>deskapp-master/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/advanced-components.js"></script>
<script>
    console.log = function() {}
    $("#barang").on('change', function() {

        $(".total").html($(this).find(':selected').attr('data-harga'));
        $(".total").val($(this).find(':selected').attr('data-harga'));

        $(".supplier").html($(this).find(':selected').attr('data-supplier'));
        $(".supplier").val($(this).find(':selected').attr('data-supplier'));

    });
</script>
</body>

</html>