<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form <?= $judul ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <div class="card-body">
            <?php
            //notifikasi
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <h4>Periksa Entry Form</h4>
                <ul>
                    <?php foreach ($errors as $key => $error) { ?>
                    <li> <?= esc($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo '</h5></div>';
            }
            ?>

            <?php
            echo form_open_multipart('Pengunjung/UpdateData/' . $pengunjung['id_pengunjung']);
            ?>

            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="class-form-group">
                                <label>Foto</label>
                                <img src="<?= base_url('foto/' . $pengunjung['foto']) ?>" id="gambar_load"
                                    class="img-fluid" width="150px" height="150px">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>File Foto</label>
                            <input type="file" name="foto" class="form-control" id="preview_gambar" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Pengunjung</label>
                                <input class="form-control" name="nama_pengunjung"
                                    value="<?= $pengunjung['nama_pengunjung'] ?>" placeholder="Nama Pengunjung">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="<?= $pengunjung['jenis_kelamin'] ?>">
                                        <?= $pengunjung['jenis_kelamin'] ?>
                                    </option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Usia</label>
                                <input class="form-control" name="usia" value="<?= $pengunjung['usia'] ?>"
                                    placeholder="Usia">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat" value="<?= $pengunjung['alamat'] ?>"
                                    placeholder="Alamat">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" name="kecamatan" value="<?= $pengunjung['kecamatan'] ?>"
                                    placeholder="Kecamatan">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kota / Kabupaten</label>
                                <input class="form-control" name="kota_kabupaten"
                                    value="<?= $pengunjung['kota_kabupaten'] ?>" placeholder="Kota/Kabupaten">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input class="form-control" name="provinsi" value="<?= $pengunjung['provinsi'] ?>"
                                    placeholder="Provinsi">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input class="form-control" name="no_hp" value="<?= $pengunjung['no_hp'] ?>"
                                    placeholder="No Handphone">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>E-Mail</label>
                                <input class="form-control" name="email" value="<?= $pengunjung['email'] ?>"
                                    placeholder="E-Mail">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" value="<?= $pengunjung['password'] ?>"
                                    placeholder="Password">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kategori Pengunjung</label>
                                <select name="id_kelas" class="form-control">
                                    <option value="<?= $pengunjung['id_kelas'] ?>"><?= $pengunjung['nama_kelas'] ?>
                                    </option>
                                    <?php foreach ($kelas as $key => $value) { ?>
                                    <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('Pengunjung') ?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
<!-- /.card -->