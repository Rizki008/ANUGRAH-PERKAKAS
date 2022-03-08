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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4"><?= $title ?></h4>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Total Harga Pesanan</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->no_pesanan ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->tgl_pesan ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($value->harga * $value->qty) ?></td>
                                <td>Rp. <?= number_format($value->jumlah_bayar) ?></td>
                                <td><?php
                                    if ($value->status_bayar == 0) { ?>
                                        <span class="badge badge-primary">Konfirmasi</span>
                                        <button class="btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#update-modal<?= $value->id_pesanan ?>">Batalkan</button>
                                        <a href=" <?= base_url('pesanan/proses/' . $value->id_pesanan) ?>" class="btn btn-sm btn-flat btn-primary">Konfirmasi</a>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Success</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Menunggu Pembayaran</h4>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Total Harga Pesanan</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan_diproses as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->no_pesanan ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->tgl_pesan ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($value->harga * $value->qty) ?></td>
                                <td>Rp. <?= number_format($value->jumlah_bayar) ?></td>
                                <td><?php
                                    if ($value->status_pesan == 1) { ?>
                                        <span class="badge badge-success">Menunggu Pembayaran</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Konfirmasi Pembayaran</h4>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Total Harga Pesanan</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($konfirmasi_bayar as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->no_pesanan ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->tgl_pesan ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($value->harga * $value->qty) ?></td>
                                <td>Rp. <?= number_format($value->jumlah_bayar) ?></td>
                                <td><?php
                                    if ($value->status_pesan == 2) { ?>
                                        <span class="badge badge-success">Konfirmasi Pembayaran</span>
                                    <?php } ?>
                                </td>
                                <td><?php
                                    if ($value->status_bayar == 1) { ?>
                                        <span class="badge badge-primary">Konfirmasi</span>
                                        <button class="btn btn-sm btn-danger btn-flat" data-toggle="modal" data-target="#update-modal<?= $value->id_pesanan ?>">Batalkan</button>
                                        <a href=" <?= base_url('pesanan/konfirmasi_bayar/' . $value->id_pesanan) ?>" class="btn btn-sm btn-flat btn-primary">Konfirmasi</a>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Success</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->
            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Pesanan Selesai</h4>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Total Harga Pesanan</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan_selesai as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->no_pesanan ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->tgl_pesan ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($value->harga * $value->qty) ?></td>
                                <td>Rp. <?= number_format($value->jumlah_bayar) ?></td>
                                <td><?php
                                    if ($value->status_pesan == 3) { ?>
                                        <span class="badge badge-success">Selesai</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->

            <!-- Bordered table  start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Pesanan Dibatalkan</h4>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No Pesanan</th>
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Total Harga Pesanan</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Status Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan_batal as $key => $value) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $value->no_pesanan ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_barang ?></td>
                                <td><?= $value->tgl_pesan ?></td>
                                <td><?= $value->qty ?></td>
                                <td>Rp. <?= number_format($value->harga * $value->qty) ?></td>
                                <td>Rp. <?= number_format($value->jumlah_bayar) ?></td>
                                <td><?php
                                    if ($value->status_pesan == 4) { ?>
                                        <span class="badge badge-danger">Dibatalkan</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Bordered table End -->
        </div>

        <?php foreach ($pesanan as $key => $value) { ?>
            <div class="modal fade" id="update-modal<?= $value->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Batalkan Pesanan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('pesanan/batal/' . $value->id_pesanan) ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Batalkan Pesanan</label>
                                    <p>Anda Yakin Membatalkan Pesanan Ini???</p>
                                </div>
                                <div class="col-lg-12">
                                    <label>Catatan</label>
                                    <input type="text" name="catatan" class="form-control" placeholder="Alasan Dibatalkan">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        <?php } ?>