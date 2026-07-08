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
            echo form_open_multipart('Buku/SimpanData');
            ?>

            <div class="row">
                <div class="col-sm-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="class-form-group">
                                <label>Cover</label>
                                <img src="<?= base_url('cover/blankavatar.png') ?>" id="gambar_load" class="img-fluid"
                                    width="150px" height="150px">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>File Cover</label>
                            <input type="file" name="cover" class="form-control" id="preview_gambar" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input class="form-control" name="judul_buku" value="<?= old('judul_buku') ?>"
                                    placeholder="Judul Buku">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kode Buku</label>
                                <input class="form-control" name="kode_buku" value="<?= old('kode_buku') ?>"
                                    placeholder="Kode Buku">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kode Eksemplar</label>
                                <input class="form-control" name="kode_eksemplar" value="<?= old('kode_eksemplar') ?>"
                                    placeholder="Kode Eksemplar">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Eksemplar</label>
                                <input type="number" class="form-control" name="eksemplar"
                                    value="<?= old('eksemplar') ?>" placeholder="Eksemplar">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>ISBN</label>
                                <input class="form-control" name="isbn" value="<?= old('isbn') ?>" placeholder="ISBN">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Kategori</label>
                                <div class="input-group">
                                    <input list="list_kategori" name="kategori" class="form-control">

                                    <datalist id="list_kategori">
                                        <?php foreach ($kategori as $value) { ?>
                                        <option value="<?= $value['nama_kategori'] ?>">
                                            <?php } ?>
                                    </datalist>

                                    <span class="input-group-append">
                                        <a href="<?= base_url('Kategori') ?>" class="btn btn-primary btn-flat">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Penerbit</label>
                                <div class="input-group">
                                    <input list="list_penerbit" name="penerbit" class="form-control">

                                    <datalist id="list_penerbit">
                                        <?php foreach ($penerbit as $value) { ?>
                                        <option value="<?= $value['nama_penerbit'] ?>">
                                            <?php } ?>
                                    </datalist>

                                    <span class="input-group-append">
                                        <a href="<?= base_url('Penerbit') ?>" class="btn btn-primary btn-flat">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Pengarang</label>
                                <div class="input-group">
                                    <input list="list_pengarang" name="pengarang" class="form-control">

                                    <datalist id="list_pengarang">
                                        <?php foreach ($pengarang as $value) { ?>
                                        <option value="<?= $value['nama_pengarang'] ?>">
                                            <?php } ?>
                                    </datalist>

                                    <span class="input-group-append">
                                        <a href="<?= base_url('Pengarang') ?>" class="btn btn-primary btn-flat">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Rak</label>
                                <div class="input-group">
                                    <input list="list_rak" name="rak" class="form-control">

                                    <datalist id="list_rak">
                                        <?php foreach ($rak as $value) { ?>
                                        <option value="<?= $value['nama_rak'] ?>">
                                            <?php } ?>
                                    </datalist>

                                    <span class="input-group-append">
                                        <a href="<?= base_url('Rak') ?>" class="btn btn-primary btn-flat">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <select name="tahun_terbit" class="form-control">
                                    <option value="">--Pilih Tahun--</option>
                                    <?php for ($i = date('Y'); $i >= 1900; $i--) { ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tempat Terbit</label>
                                <input class="form-control" name="tempat_terbit" value="<?= old('tempat_terbit') ?>"
                                    placeholder="Tempat Terbit">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Buku</label>
                                <select name="jenis_buku" class="form-control">
                                    <option value="">--Pilih Jenis Buku--</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Khusus">Khusus</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Bahasa</label>
                                <input class="form-control" name="bahasa" value="<?= old('bahasa') ?>"
                                    placeholder="Bahasa">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Deskripsi / Sinopsis</label>
                                <textarea rows="5" class="form-control"
                                    name="deskripsi"><?= old('deskripsi') ?></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= base_url('Buku') ?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
<!-- /.card -->