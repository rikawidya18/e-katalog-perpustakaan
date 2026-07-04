<div class="col-md-12">
    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">
                <i class="fas fa-book mr-1"></i> <?= $judul ?>
            </h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-hover align-middle">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th width="130">Cover</th>
                            <th width="380">Informasi Buku</th>
                            <th>Deskripsi / Sinopsis</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($buku as $value): ?>
                        <tr>
                            <!-- Cover -->
                            <td class="text-center align-middle">
                                <img src="<?= base_url('cover/' . $value['cover']) ?>" alt="<?= $value['judul_buku'] ?>"
                                    class="img-fluid rounded shadow-sm"
                                    style="height:160px; width:110px; object-fit:cover;">
                            </td>

                            <!-- Informasi Buku -->
                            <td>
                                <h6 class="text-primary font-weight-bold mb-2">
                                    <?= $value['judul_buku'] ?>
                                </h6>

                                <table class="table table-borderless table-sm mb-2">
                                    <tr>
                                        <td width="110"><i class="fas fa-tags text-secondary"></i> Kategori</td>
                                        <td>: <?= $value['nama_kategori'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-user text-secondary"></i> Pengarang</td>
                                        <td>: <?= $value['nama_pengarang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-building text-secondary"></i> Penerbit</td>
                                        <td>: <?= $value['nama_penerbit'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-calendar text-secondary"></i> Tahun</td>
                                        <td>: <?= $value['tahun_terbit'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-map-marker-alt text-secondary"></i> Rak</td>
                                        <td>: <?= $value['nama_rak'] ?></td>
                                    </tr>
                                </table>

                                <a href="<?= base_url('Home/DetailBuku/' . $value['id_buku']) ?>"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i> Detail Buku
                                </a>
                            </td>

                            <!-- Deskripsi -->
                            <td style="vertical-align: top;">
                                <p class="mb-2 text-justify" style="line-height:1.6;">
                                    <?= substr(strip_tags($value['deskripsi']), 0, 300) ?>...
                                </p>

                                <a href="<?= base_url('Home/DetailBuku/' . $value['id_buku']) ?>"
                                    class="text-primary font-weight-bold">
                                    Baca Selengkapnya →
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>