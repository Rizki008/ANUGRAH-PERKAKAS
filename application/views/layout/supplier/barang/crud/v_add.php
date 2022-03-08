<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('supplier') ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4"><?= $title ?></h4>
                    </div>
                </div>
                <?php

                echo validation_errors('<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

                if (isset($error_upload)) {
                    echo '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                }
                echo form_open_multipart('barang/add') ?>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="<?= set_value('nama_barang') ?>">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="text" name="stock" value="<?= set_value('stock') ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" value="<?= set_value('harga') ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group">
                            <label class="custom-file-label">Gambar</label>
                            <input type="file" name="gambar" class="custom-file-input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <a href="<?= base_url('barang') ?>" class="btn btn-primary btn-sm scroll-click"><i class="fa fa-angle-double-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm scroll-click"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>