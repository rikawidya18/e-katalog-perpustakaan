<div class="col-md-12">
    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Tanggal Download</th>
                        <th>Judul Ebook</th>
                        <th>Kategori</th>
                        <th>Kelas Pengunjung</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($download)) { ?>
                    <tr>
                        <td colspan="5" class="text-center">Data tidak tersedia</td>
                    </tr>
                    <?php } else {
                        $no = 1;
                        foreach ($download as $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td><?= date('d-m-Y', strtotime($value['tgl_download'])) ?></td>
                        <td><?= $value['judul_ebook'] ?></td>
                        <td><?= $value['nama_kategori'] ?></td>
                        <td><?= $value['nama_kelas'] ?></td>
                    </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>