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

<script src="<?= base_url() ?>deskapp-master/src/plugins/jquery-steps/jquery.steps.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/steps-setting.js"></script>

<script src="<?= base_url() ?>deskapp-master/src/plugins/cropperjs/dist/cropper.js"></script>
<script>
    console.log = function() {}
    $("#barang").on('change', function() {

        $(".total").html($(this).find(':selected').attr('data-harga'));
        $(".total").val($(this).find(':selected').attr('data-harga'));

        $(".supplier").html($(this).find(':selected').attr('data-supplier'));
        $(".supplier").val($(this).find(':selected').attr('data-supplier'));

    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        var image = document.getElementById('image');
        var cropBoxData;
        var canvasData;
        var cropper;

        $('#modal').on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                autoCropArea: 0.5,
                dragMode: 'move',
                aspectRatio: 3 / 3,
                restore: false,
                guides: false,
                center: false,
                highlight: false,
                cropBoxMovable: false,
                cropBoxResizable: false,
                toggleDragModeOnDblclick: false,
                ready: function() {
                    cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                }
            });
        }).on('hidden.bs.modal', function() {
            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
        });
    });
</script>

</body>

</html>