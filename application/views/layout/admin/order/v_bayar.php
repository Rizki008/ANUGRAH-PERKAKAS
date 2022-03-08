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
                                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="invoice-wrap">
                <?php foreach ($invoice as $key => $value) { ?>
                    <div class="invoice-box">
                        <div class="invoice-header">
                            <div class="logo text-center">
                                <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.png" alt="">
                            </div>
                        </div>
                        <h4 class="text-center mb-30 weight-600">INVOICE</h4>
                        <div class="row pb-30">
                            <div class="col-md-6">
                                <h5 class="mb-15"><?=
                                                    $this->session->userdata('nama') ?></h5>
                                <p class="font-14 mb-5">Tanggal Pesan: <strong class="weight-600"><?= $value->tgl_pesan ?></strong></p>
                                <p class="font-14 mb-5">No Pesanan: <strong class="weight-600"><?= $value->no_pesanan ?></strong></p>
                            </div>
                        </div>
                        <div class="invoice-desc pb-30">
                            <div class="invoice-desc-head clearfix">
                                <div class="invoice-sub">Nama Barang</div>
                                <div class="invoice-rate">Harga</div>
                                <div class="invoice-hours">Jumlah Pesan</div>
                                <div class="invoice-subtotal">Subtotal</div>
                            </div>
                            <div class="invoice-desc-body">
                                <ul>
                                    <li class="clearfix">
                                        <div class="invoice-sub"><?= $value->nama_barang ?></div>
                                        <div class="invoice-rate">Rp.<?= number_format($value->harga, 0) ?></div>
                                        <div class="invoice-hours"><?= $value->qty ?></div>
                                        <div class="invoice-subtotal"><span class="weight-600">Rp. <?= number_format($value->qty * $value->harga, 0) ?></span></div>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('order/bayar/' . $value->id_pesanan) ?>" class="btn btn-success" type="submit">Bayar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <h4 class="text-center pb-20">Thank You!!</h4>
                    </div>
                <?php } ?>

            </div>
        </div>