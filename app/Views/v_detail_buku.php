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
                    <img src="<?= base_url('cover/' . $buku['cover']) ?>" alt="<?= $buku['judul_buku'] ?>"
                        class="img-fluid rounded shadow-sm mb-3" style="width:120px; height:170px; object-fit:cover;">
                </div>

                <!-- Detail Buku -->
                <div class="col-md-9">
                    <table class="table table-borderless table-sm">
                        <tr>
                            <th>Kode Buku</th>
                            <td>:</td>
                            <td><?= $buku['kode_buku'] ?></td>
                        </tr>
                        <tr>
                            <th width="180">Judul Buku</th>
                            <td width="10">:</td>
                            <td class="font-weight-bold text-primary"><?= $buku['judul_buku'] ?></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td><?= $buku['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <th>Pengarang</th>
                            <td>:</td>
                            <td><?= $buku['nama_pengarang'] ?></td>
                        </tr>
                        <tr>
                            <th>Penerbit</th>
                            <td>:</td>
                            <td><?= $buku['nama_penerbit'] ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Terbit</th>
                            <td>:</td>
                            <td><?= $buku['tahun_terbit'] ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Terbit</th>
                            <td>:</td>
                            <td><?= $buku['tempat_terbit'] ?></td>
                        </tr>
                        <tr>
                            <th>Rak</th>
                            <td>:</td>
                            <td><?= $buku['nama_rak'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Buku</th>
                            <td>:</td>
                            <td><?= $buku['jenis_buku'] ?></td>
                        </tr>
                        <tr>
                            <th>Bahasa</th>
                            <td>:</td>
                            <td><?= $buku['bahasa'] ?></td>
                        </tr>
                        <tr>
                            <th>ISBN</th>
                            <td>:</td>
                            <td><?= $buku['isbn'] ?: '-' ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Eksemplar</th>
                            <td>:</td>
                            <td><?= $buku['eksemplar'] ?> Buku</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Deskripsi -->
            <hr>
            <h6 class="font-weight-bold text-primary mb-2">
                <i class="fas fa-align-left mr-1"></i> Deskripsi Buku
            </h6>
            <p class="text-justify" style="line-height:1.7;">
                <?= nl2br($buku['deskripsi']) ?>
            </p>
        </div>
    </div>
</div>