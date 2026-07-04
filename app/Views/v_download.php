<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <?php 
        if(session()->getFlashdata('pesan')){
            echo'<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> ';
            echo session()->getFlashdata('pesan');
            echo'</h5></div>';
        }
        ?>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Tanggal Download</th>
                        <th>Judul Ebook</th>
                        <th>Kategori</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($download)) { ?>
                    <tr>
                        <td colspan="4" class="text-center">Data tidak tersedia</td>
                    </tr>
                    <?php } else { 
            $no = 1;
            foreach ($download as $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?>.</td>
                        <td><?= date('d-m-Y', strtotime($value['tgl_download'])) ?></td>
                        <td><?= $value['judul_ebook'] ?></td>
                        <td><?= $value['nama_kategori'] ?></td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>