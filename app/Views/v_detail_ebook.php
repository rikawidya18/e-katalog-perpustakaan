<div class="col-md-12">
    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                <i class="fas fa-book mr-1"></i> <?= $judul ?>
            </h3>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Cover -->
                <div class="col-md-3 text-center">
                    <img src="<?= base_url('ebooks/' . $ebook['cover']) ?>" alt="<?= $ebook['judul_ebook'] ?>"
                        class="img-fluid rounded shadow-sm mb-3" style="width:120px; height:170px; object-fit:cover;">
                </div>

                <!-- Detail ebook -->
                <div class="col-md-9">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <th width="180">Judul ebook</th>
                            <td width="10">:</td>
                            <td class="font-weight-bold text-primary"><?= $ebook['judul_ebook'] ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td><?= $ebook['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <th>Pengarang</th>
                            <td>:</td>
                            <td><?= $ebook['nama_pengarang'] ?></td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>:</td>
                            <td><?= $ebook['nama_penerbit'] ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td>:</td>
                            <td><?= $ebook['tahun_terbit'] ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Terbit</th>
                            <td>:</td>
                            <td><?= $ebook['tempat_terbit'] ?></td>
                        </tr>
                        <tr>
                            <th>Bahasa</th>
                            <td>:</td>
                            <td><?= $ebook['bahasa'] ?></td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td>:</td>
                            <td><?= $ebook['isbn'] ?: '-' ?></td>
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
            <!-- Deskripsi -->
            <hr>
            <h6 class=" font-weight-bold text-primary mb-2">
                <i class="fas fa-align-left mr-1"></i> Deskripsi ebook
            </h6>
            <p class="text-justify" style="line-height:1.7;">
                <?= nl2br($ebook['deskripsi']) ?>
            </p>
        </div>
    </div>
</div>