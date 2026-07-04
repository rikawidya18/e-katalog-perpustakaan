<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Ebook/AddData') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover">

                    <div class="row mb-3">

                        <div class="col-md-3">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <label>&nbsp;</label>
                            <button type="button" id="filter" class="btn btn-primary btn-block">
                                <i class="fas fa-search"></i> Filter
                            </button>
                        </div>

                        <div class="col-md-2">
                            <label>&nbsp;</label>
                            <a href="<?= base_url('Ebook') ?>" class="btn btn-success btn-block">
                                <i class="fas fa-sync"></i> Reset
                            </a>
                        </div>

                    </div>

                    <thead>
                        <tr class="text-center">
                            <th width="50px">No</th>
                            <th>User</th>
                            <th>Level</th>
                            <th>Tgl Input</th>
                            <th>ID Ebook</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tempat Terbit</th>
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                            <th>Bahasa</th>
                            <th>ISBN</th>
                            <th>File Ebook</th>
                            <th width="80px">Action</th>
                        </tr>
                    </thead>
                    <?php $no = 1;
                    foreach ($ebook as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>

                        <td><?= $value['nama_user'] ?></td>
                        <td><?= $value['level'] ?></td>
                        <td><?= date('d-m-Y', strtotime($value['tgl_input'])) ?></td>
                        <td>EBOOK<?= sprintf("%04d", $value['id_ebook']) ?></td>
                        <td class="text-center">
                            <img src="<?= base_url('ebooks/' . $value['cover']) ?>" width="75px">
                        </td>
                        <td><?= $value['judul_ebook'] ?></td>
                        <td><?= $value['nama_pengarang'] ?></td>
                        <td><?= $value['nama_penerbit'] ?></td>
                        <td><?= $value['tempat_terbit'] ?></td>
                        <td><?= $value['tahun_terbit'] ?></td>
                        <td><?= $value['nama_kategori'] ?></td>
                        <td><?= $value['bahasa'] ?></td>
                        <td><?= $value['isbn'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('ebooksfile/' . $value['file_ebook']) ?>"
                                class="btn btn-success btn-sm">
                                <i class="fas fa-file-pdf"></i> Download
                            </a>
                        </td>
                        <td class=" text-center">
                            <a href="<?= base_url('Ebook/EditData/' . $value['id_ebook']) ?>"
                                class="btn btn-warning btn-flat btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal"
                                data-target="#modal-delete<?= $value['id_ebook'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Delete -->
<?php foreach ($ebook as $key => $value) { ?>
<div class="modal fade" id="modal-delete<?= $value['id_ebook'] ?>">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete <?= $judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('Ebook/DeleteData/' . $value['id_ebook'])) ?>
                <div class="form-group">
                    Yakin Ingin Menghapus Data <b><?= $value['judul_ebook'] ?></b>... ?
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-flat">Delete</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>