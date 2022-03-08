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
            <!-- Responsive tables Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4"><?= $title ?></h4>
                    </div>
                    <div class="pull-right">
                        <a href="<?= base_url('order/pesan') ?>" class="btn-block btn btn-primary btn-sm scroll-click" type="button">
                            <i class="fa fa-telegram"></i> Pesan
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Total Harga Barang</th>
                                <th scope="col">Status_pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($order as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $value->nama_barang ?></td>
                                    <td><?= $value->nama ?></td>
                                    <td>Rp. <?= number_format($value->qty * $value->harga) ?></td>
                                    <td>
                                        <?php if ($value->status_pesan == 0) { ?>
                                            <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                        <?php } else if ($value->status_pesan == 1) { ?>
                                            <span class="badge badge-success">Pesanan Di Konfirmasi</span>
                                            <a href="<?= base_url('order/detail_pesanan/' . $value->no_pesanan) ?>" class="btn btn-outline-success">Bayar</a>
                                        <?php } elseif ($value->status_pesan == 2) { ?>
                                            <span class="badge badge-primary">Menunggu Pembayaran DiKonfirmasi</span>
                                        <?php } elseif ($value->status_pesan == 3) { ?>
                                            <span class="badge badge-success">Pesanan Selesai</span><br>
                                        <?php } elseif ($value->status_pesan == 4) { ?>
                                            <span class="badge badge-danger">Dibatalkan</span>
                                            <p><?= $value->catatan ?></p>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Responsive tables End -->
        </div>