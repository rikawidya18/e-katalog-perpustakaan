<div class="col-sm-12">
    <?php

    if (!empty($pengunjung['verifikasi']) && $pengunjung['verifikasi'] == 1): ?>

    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check"></i> Akun Anda Sudah Terverifikasi ! </h4>
    </div>

    <?php else: ?>

    <div class="alert alert-danger alert-dismissible shadow-sm">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;
        </button>

        <h5 class="font-weight-bold">
            <i class="fas fa-exclamation-circle mr-1"></i>
            Akun Anda Belum Terverifikasi
        </h5>

        <p class="mb-1">
            Silakan hubungi petugas Perpustakaan Museum Negeri NTB untuk proses verifikasi akun.
        </p>

        <p class="mb-0">
            <i class="fas fa-envelope mr-1"></i>
            Email:
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=PerpustakaanMuseumNTB@gmail.com" target="_blank">
                <b>PerpustakaanMuseumNTB@gmail.com</b>
            </a>
        </p>
    </div>

    <?php endif; ?>
</div>


<div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="img-fluid" src="<?= base_url('foto/' . $pengunjung['foto']) ?>" width="80px"
                    alt="User profile picture">
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="col-md-9">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
            <div class="card-tools">
                <a href="<?= base_url('DashboardPengunjung/EditProfile') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th width="150px">Nama Pengunjung</th>
                    <th width="50px"> : </th>
                    <td> <?= $pengunjung['nama_pengunjung'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <th> : </th>
                    <td> <?= $pengunjung['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <th>Usia</th>
                    <th> : </th>
                    <td> <?= $pengunjung['usia'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th> : </th>
                    <td> <?= $pengunjung['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <th> : </th>
                    <td> <?= $pengunjung['kecamatan'] ?></td>
                </tr>
                <tr>
                    <th>Kabupaten / Kota</th>
                    <th> : </th>
                    <td> <?= $pengunjung['kota_kabupaten'] ?></td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <th> : </th>
                    <td> <?= $pengunjung['provinsi'] ?></td>
                </tr>
                <tr>
                    <th>No Handphone</th>
                    <th> : </th>
                    <td> <?= $pengunjung['no_hp'] ?></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <th> : </th>
                    <td> <?= $pengunjung['email'] ?></td>
                </tr>
                <tr>
                    <th>Kategori Pengunjung</th>
                    <th> : </th>
                    <td> <?= $pengunjung['nama_kelas'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>