<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                January 2018
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Export List</a>
                                <a class="dropdown-item" href="#">Policies</a>
                                <a class="dropdown-item" href="#">View Assets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Form grid</h4>
                        <p class="mb-30">All bootstrap element classies</p>
                    </div>
                </div>
                <?php echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

                //notifikasi gagal upload gambar
                if (isset($error_upload)) {
                    echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
                }
                echo form_open('order/pesan');
                $no_pesanan = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Barang</label>
                            <select name="id_barang" id="barang" class="form-control">
                                <option value="">Pilih Barang...</option>
                                <?php foreach ($barang as $key => $value) { ?>
                                    <option data-harga="<?= $value->harga ?>" data-supplier="<?= $value->nama ?>" value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Supplier</label>
                            <input type="text" name="supplier" class="supplier form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="total" class="total form-control" disabled>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Jumlah Pesanan</label>
                            <input type="text" name="qty" data class=" form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <a href="<?= base_url('order') ?>" class="btn btn-primary btn-sm scroll-click"><i class="fa fa-angle-double-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary btn-sm scroll-click"><i class="fa fa-telegram"></i> Order</button>
                        </div>
                    </div>
                </div>
                <input name="no_pesanan" value="<?= $no_pesanan ?>" hidden>
                <input name="tot" name="total" class="total" type="text" hidden>
                <input name="sup" name="supplier" class="supplier" type="text" hidden>
                <?php echo form_close() ?>
            </div>
        </div>