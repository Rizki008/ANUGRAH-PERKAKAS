<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Advanced Components</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Advanced Components</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Bootstrap TouchSpin Start -->
            <div class="pd-20 card-box height-100-p mb-30">
                <div class="clearfix mb-30">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Bootstrap TouchSpin</h4>
                    </div>
                </div>
                <?php echo form_open_multipart('order/bayar/' . $pesanan->id_pesanan) ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" name="jumlah_bayar" class="form-control" placeholder="jumlah bayar">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Bukti Bayar</label>
                            <input type="file" name="bukti_bayar" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i></button>
                            <a href="<?= base_url('order/pesan') ?>" class="btn btn-primary" type="submit"><i class="icon-copy fa fa-angle-double-left"></i></a>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- Bootstrap TouchSpin End -->
        </div>