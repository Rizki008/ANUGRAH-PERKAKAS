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
            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4"><?= $title ?></h4>
                    <div class="pull-right">
                        <a href="<?= base_url('customer/pesan') ?>" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Barang</a>
                    </div>
                </div>

                <div class="pb-20">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Name</th>
                                <th>Kategori</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang_selesai as $key => $value) { ?>
                                <tr>
                                    <td class="table-plus"><?= $value->nama_barang ?></td>
                                    <td><?= $value->nama_kategori ?></td>
                                    <td><?= $value->qty ?></td>
                                    <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                    <td><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>