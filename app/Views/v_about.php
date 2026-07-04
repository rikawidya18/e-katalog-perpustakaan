<div class="col-md-12">

    <div class="card card-outline card-primary shadow-sm">

        <div class="card-body">

            <!-- ===== INFO ===== -->
            <div class="row">

                <div class="col-md-6 mb-2">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-primary">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Alamat</span>
                            <span class="info-box-number"><?= $web['alamat'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-success">
                            <i class="fas fa-city"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kabupaten / Kota</span>
                            <span class="info-box-number"><?= $web['kab_kota'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-warning">
                            <i class="fas fa-map"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kecamatan</span>
                            <span class="info-box-number"><?= $web['kecamatan'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-danger">
                            <i class="fas fa-phone"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">No Telepon</span>
                            <span class="info-box-number"><?= $web['no_telpon'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="info-box shadow-sm">
                        <span class="info-box-icon bg-info">
                            <i class="fas fa-mail-bulk"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kode POS</span>
                            <span class="info-box-number"><?= $web['pos'] ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <!-- JADWAL + TIKET + TATA TERTIB -->
            <div class="row">

                <!-- Jadwal -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header py-2 bg-primary text-white">
                            <b>Jadwal Buka</b>
                        </div>
                        <div class="card-body py-2">
                            Senin : 10.00 - 16.00 WITA<br>
                            Selasa - Kamis : 08.00 - 16.00 WITA<br>
                            Jumat : 09.00 - 17.00 WITA<br>
                            Sabtu - Minggu : 09.00 - 14.00 WITA<br>
                            <span class="text-danger font-weight-bold">
                                *Tutup hari libur nasional
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tiket -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header py-2 bg-success text-white">
                            <b>Harga Tiket</b>
                        </div>
                        <div class="card-body py-2">
                            Dewasa : Rp 5.000<br>
                            Anak : Rp 2.000<br>
                            Wisman : Rp 20.000<br>
                            <span class="text-warning font-weight-bold">
                                Rombongan wajib konfirmasi email
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Tata Tertib -->
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-header py-2 bg-danger text-white">
                            <b>Tata Tertib</b>
                        </div>
                        <div class="card-body py-2">
                            • Dilarang menyentuh koleksi<br>
                            • Dilarang makan/minum<br>
                            • Dilarang berlari<br>
                            • Dilarang membawa hewan<br>
                            • Dilarang membuang sampah<br>
                            • Dilarang merokok<br>
                            • Dilarang menyalakan api
                        </div>
                    </div>
                </div>

            </div>

        </div>