<div class="container mt-4">

    <h4 class="mb-3">
        <i class="fas fa-book text-primary"></i> Hasil Pencarian Buku
    </h4>

    <?php if (!empty($buku)) { ?>
        <?php foreach ($buku as $b) { ?>

            <div class="card card-outline card-primary shadow-sm mb-4">

                <div class="card-body">
                    <div class="row">

                        <!-- Cover -->
                        <div class="col-md-3 text-center">
                            <img src="<?= base_url('cover/' . $b['cover']) ?>" class="img-fluid rounded shadow-sm mb-3"
                                style="width:120px;height:170px;object-fit:cover;">
                        </div>

                        <!-- Detail Buku -->
                        <div class="col-md-9">

                            <table class="table table-borderless table-sm">

                                <tr>
                                    <th width="180">Kode Buku</th>
                                    <td width="10">:</td>
                                    <td><?= $b['kode_buku'] ?></td>
                                </tr>

                                <tr>
                                    <th>Judul Buku</th>
                                    <td>:</td>
                                    <td class="font-weight-bold text-primary">
                                        <?= $b['judul_buku'] ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Kategori</th>
                                    <td>:</td>
                                    <td><?= $b['nama_kategori'] ?></td>
                                </tr>

                                <tr>
                                    <th>Pengarang</th>
                                    <td>:</td>
                                    <td><?= $b['nama_pengarang'] ?></td>
                                </tr>

                                <tr>
                                    <th>Penerbit</th>
                                    <td>:</td>
                                    <td><?= $b['nama_penerbit'] ?></td>
                                </tr>

                                <tr>
                                    <th>Tahun Terbit</th>
                                    <td>:</td>
                                    <td><?= $b['tahun_terbit'] ?></td>
                                </tr>

                                <tr>
                                    <th>Tempat Terbit</th>
                                    <td>:</td>
                                    <td><?= $b['tempat_terbit'] ?></td>
                                </tr>

                                <tr>
                                    <th>Rak</th>
                                    <td>:</td>
                                    <td><?= $b['nama_rak'] ?></td>
                                </tr>

                                <tr>
                                    <th>Jenis Buku</th>
                                    <td>:</td>
                                    <td><?= $b['jenis_buku'] ?></td>
                                </tr>

                                <tr>
                                    <th>Bahasa</th>
                                    <td>:</td>
                                    <td><?= $b['bahasa'] ?></td>
                                </tr>

                                <tr>
                                    <th>ISBN</th>
                                    <td>:</td>
                                    <td><?= $b['isbn'] ?: '-' ?></td>
                                </tr>

                                <tr>
                                    <th>Jumlah Eksemplar</th>
                                    <td>:</td>
                                    <td><?= $b['eksemplar'] ?> Buku</td>
                                </tr>

                            </table>

                        </div>
                    </div>

                    <hr>

                    <h6 class="font-weight-bold text-primary mb-2">
                        <i class="fas fa-align-left"></i> Deskripsi Buku
                    </h6>

                    <p style="line-height:1.7">
                        <?= nl2br($b['deskripsi']) ?>
                    </p>

                </div>

            </div>

        <?php } ?>

    <?php } else { ?>

        <div class="alert alert-warning">
            Buku tidak ditemukan
        </div>

    <?php } ?>

    <hr class="mt-5 mb-4">

    <h4 class="mb-3">
        <i class="fas fa-tablet-alt text-success"></i> Hasil Pencarian Ebook
    </h4>

    <?php if (!empty($ebook)) { ?>
        <?php foreach ($ebook as $e) { ?>

            <div class="card card-outline card-success shadow-sm mb-4">

                <div class="card-body">

                    <div class="row">

                        <!-- Cover -->
                        <div class="col-md-3 text-center">

                            <img src="<?= base_url('ebooks/' . $e['cover']) ?>" class="img-fluid rounded shadow-sm mb-3"
                                style="width:120px;height:170px;object-fit:cover;">

                        </div>

                        <!-- Detail Ebook -->
                        <div class="col-md-9">

                            <table class="table table-borderless table-sm">

                                <tr>
                                    <th width="180">Judul Ebook</th>
                                    <td width="10">:</td>
                                    <td class="font-weight-bold text-success">
                                        <?= $e['judul_ebook'] ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Kategori</th>
                                    <td>:</td>
                                    <td><?= $e['nama_kategori'] ?></td>
                                </tr>

                                <tr>
                                    <th>Pengarang</th>
                                    <td>:</td>
                                    <td><?= $e['nama_pengarang'] ?></td>
                                </tr>

                                <tr>
                                    <th>Penerbit</th>
                                    <td>:</td>
                                    <td><?= $e['nama_penerbit'] ?></td>
                                </tr>

                                <tr>
                                    <th>Tahun Terbit</th>
                                    <td>:</td>
                                    <td><?= $e['tahun_terbit'] ?></td>
                                </tr>

                                <tr>
                                    <th>Tempat Terbit</th>
                                    <td>:</td>
                                    <td><?= $e['tempat_terbit'] ?></td>
                                </tr>

                                <tr>
                                    <th>Bahasa</th>
                                    <td>:</td>
                                    <td><?= $e['bahasa'] ?></td>
                                </tr>

                                <tr>
                                    <th>ISBN</th>
                                    <td>:</td>
                                    <td><?= $e['isbn'] ?: '-' ?></td>
                                </tr>

                                <tr>
                                    <th>file_ebook</th>
                                    <td>:</td>
                                    <td>
                                        <?php if (session()->get('level') <> "") { ?>
                                            <a href="<?= base_url('Ebook/download/' . $ebook['id_ebook']) ?>"
                                                class="btn btn-flat btn-sm btn-success">
                                                <i class="fas fa-file-pdf"></i>
                                                Download PDF
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Auth/LoginPengunjung') ?>" class="btn btn-sm btn-danger">
                                                <i class="fas fa-lock"></i>
                                                Login Untuk Download
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <hr>

                    <h6 class="font-weight-bold text-success mb-2">
                        <i class="fas fa-align-left"></i> Deskripsi Ebook
                    </h6>

                    <p style="line-height:1.7">
                        <?= nl2br($e['deskripsi']) ?>
                    </p>

                </div>

            </div>

        <?php } ?>

    <?php } else { ?>

        <div class="alert alert-warning">
            Ebook tidak ditemukan
        </div>

    <?php } ?>

</div>