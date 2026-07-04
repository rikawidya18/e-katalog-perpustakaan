<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Form <?= $judul ?></h3>
        </div>

        <div class="card-body">

            <?= form_open_multipart('Pengunjung/UpdateProfile'); ?>

            <div class="row">

                <!-- FOTO -->
                <div class="col-md-3 text-center">
                    <label>Foto</label><br>
                    <img src="<?= base_url('foto/' . $pengunjung['foto']) ?>" id="gambar_load" class="img-fluid"
                        width="150px">

                    <input type="file" name="foto" class="form-control mt-2" id="preview_gambar" accept="image/*">
                </div>

                <!-- FORM -->
                <div class="col-md-9">

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama_pengunjung"
                            value="<?= $pengunjung['nama_pengunjung'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki"
                                <?= ($pengunjung['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : '' ?>>
                                Laki-Laki
                            </option>
                            <option value="Perempuan"
                                <?= ($pengunjung['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>
                                Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" value="<?= $pengunjung['alamat'] ?>">
                    </div>

                    <div class="form-group">
                        <label>No Handphone</label>
                        <input class="form-control" name="no_hp" value="<?= $pengunjung['no_hp'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control">

                            <option value="<?= $pengunjung['id_kelas'] ?>" selected>
                                <?= $pengunjung['nama_kelas'] ?>
                            </option>

                            <?php foreach ($kelas as $value) { ?>
                            <option value="<?= $value['id_kelas'] ?>">
                                <?= $value['nama_kelas'] ?>
                            </option>
                            <?php } ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" name="email" value="<?= $pengunjung['email'] ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                </div>
            </div>

            <?= form_close(); ?>

        </div>
    </div>
</div>