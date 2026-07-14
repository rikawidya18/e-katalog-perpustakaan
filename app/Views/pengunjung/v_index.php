<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>

            <div class="card-tools">
                <a href="<?= base_url('Pengunjung/AddData') ?>" class="btn btn-primary btn-flat btn-sm">
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
                        <a href="<?= base_url('Pengunjung') ?>" class="btn btn-success btn-block">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>

                </div>

                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Nama Pengunjung</th>
                        <th>Tanggal Registrasi</th>
                        <th>ID Pengunjung</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>E-Mail</th>
                        <th>Password</th>
                        <th>Kelas</th>
                        <th>Foto</th>
                        <th width="80px">Action</th>
                    </tr>
                </thead>

                <?php $no = 1;
                foreach ($pengunjung as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td>
                            <?= $value['nama_pengunjung'] ?><br>

                            <?php if ($value['verifikasi'] != 0): ?>

                                <span class="text-success">
                                    <i class="fas fa-check"></i> Terverifikasi
                                </span><br>

                                <small>
                                    Oleh: <b><?= !empty($value['nama_user']) ? $value['nama_user'] : '-' ?></b><br>
                                    Tanggal:
                                    <?= !empty($value['tgl_verifikasi']) ? $value['tgl_verifikasi'] : '-' ?>
                                </small>

                            <?php else: ?>

                                <span class="text-danger">
                                    <i class="fas fa-times"></i> Belum Terverifikasi
                                </span><br>

                                <a class="btn btn-success btn-xs"
                                    href="<?= base_url('Pengunjung/Verifikasi/' . $value['id_pengunjung']) ?>"
                                    onclick="return confirm('Yakin ingin memverifikasi pengunjung ini?')">
                                    Verifikasi Sekarang
                                </a>

                            <?php endif; ?>
                        </td>

                        <td><?= date('d-m-Y', strtotime($value['tgl_input'])) ?></td>
                        <td>PNJ<?= sprintf("%04d", $value['id_pengunjung']) ?></td>
                        <td><?= $value['jenis_kelamin'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['no_hp'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['password'] ?></td>
                        <td><?= $value['nama_kelas'] ?></td>
                        <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="50px"
                                height="50px"></td>
                        <td class="text-center">
                            <a href="<?= base_url('Pengunjung/EditData/' . $value['id_pengunjung']) ?>"
                                class="btn btn-warning btn-flat btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal"
                                data-target="#modal-delete<?= $value['id_pengunjung'] ?>">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


<!-- Modal Delete -->
<?php foreach ($pengunjung as $key => $value) { ?>
    <div class="modal fade" id="modal-delete<?= $value['id_pengunjung'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $judul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open(base_url('pengunjung/DeleteData/' . $value['id_pengunjung'])) ?>
                    <div class="form-group">
                        Yakin Ingin Menghapus Data <b><?= $value['nama_pengunjung'] ?></b>... ?
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