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
                        <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Barang</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($barang as $key => $value) { ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $value->nama_barang ?></td>
                                    <td><?= $value->stock ?></td>
                                    <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                    <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?= base_url('barang/update/' . $value->id_barang) ?>" role="button">Edit</a>
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal<?= $value->id_barang ?>">Delet</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- Responsive tables End -->
        </div>


        <?php foreach ($barang as $key => $value) { ?>
            <div class="modal fade" id="delete-modal<?= $value->id_barang ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Delete Barang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Hapus Barang <b><?= $value->nama_barang ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-primary">Save changes</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>