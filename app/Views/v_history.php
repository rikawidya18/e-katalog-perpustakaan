<div class="col-md-12">

    <div class="card card-outline card-primary">

        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>

        <div class="card-body">

            <table id="example1" class="table table-bordered table-hover">

                <thead>

                    <tr class="text-center">

                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pengunjung</th>
                        <th>Aktivitas</th>
                        <th>Keyword</th>
                        <th>Buku</th>
                        <th>Ebook</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $no=1; ?>

                    <?php foreach($history as $value){ ?>

                    <tr>

                        <td><?= $no++ ?></td>

                        <td><?= date('d-m-Y',strtotime($value['tgl_history'])) ?></td>

                        <td><?= $value['nama_pengunjung'] ?></td>

                        <td><?= $value['aktivitas'] ?></td>

                        <td><?= $value['keyword'] ?></td>

                        <td><?= $value['judul_buku'] ?></td>

                        <td><?= $value['judul_ebook'] ?></td>

                    </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>