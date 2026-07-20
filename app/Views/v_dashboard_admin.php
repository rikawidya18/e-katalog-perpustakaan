<div class="col-lg-4 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $totalbuku ?></h3>
            <p>Buku</p>
        </div>
        <div class="icon">
            <i class="fas fa-book"></i>
        </div>
        <a href="<?= base_url('Buku') ?>" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $totalebook ?></h3>
            <p>E-Book</p>
        </div>
        <div class="icon">
            <i class="fas fa-file-pdf"></i>
        </div>
        <a href="<?= base_url('Ebook') ?>" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $totalpengunjung ?></h3>
            <p>Pengunjung</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a href="<?= base_url('Pengunjung') ?>" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<!-- ./col -->

<?php
$label_download = $label_download ?? '[]';
$data_download = $data_download ?? '[]';

$labels = $labels ?? '[]';
$data_buku = $data_buku ?? '[]';
$data_ebook = $data_ebook ?? '[]';

$label_pengunjung = $label_pengunjung ?? '[]';
$data_pengunjung = $data_pengunjung ?? '[]';

$label_aktivitas = $label_aktivitas ?? '[]';
$data_aktivitas = $data_aktivitas ?? '[]';
?>

<?php
// FILTER DOWNLOAD
$tgl_awal_download = $_GET['tgl_awal_download'] ?? '';
$tgl_akhir_download = $_GET['tgl_akhir_download'] ?? '';

if (!empty($tgl_awal_download) && !empty($tgl_akhir_download)) {
    $judul_filter_download = "Periode " . date('d-m-Y', strtotime($tgl_awal_download)) . " s/d " . date('d-m-Y', strtotime($tgl_akhir_download));
} else {
    $judul_filter_download = "Semua Data";
}


// FILTER BUKU & EBOOK (tidak pakai filter tanggal)
$judul_filter_buku = "Semua Data";

// FILTER PENGUNJUNG
$tgl_awal_pengunjung = $_GET['tgl_awal_pengunjung'] ?? '';
$tgl_akhir_pengunjung = $_GET['tgl_akhir_pengunjung'] ?? '';

if (!empty($tgl_awal_pengunjung) && !empty($tgl_akhir_pengunjung)) {
    $judul_filter_pengunjung = "Periode " . date('d-m-Y', strtotime($tgl_awal_pengunjung)) . " s/d " . date('d-m-Y', strtotime($tgl_akhir_pengunjung));
} else {
    $judul_filter_pengunjung = "Semua Data";
}

//FILTER HISTORY
$tgl_awal_history = $_GET['tgl_awal_history'] ?? '';
$tgl_akhir_history = $_GET['tgl_akhir_history'] ?? '';

if (!empty($tgl_awal_history) && !empty($tgl_akhir_history)) {

    $judul_filter_history =
        "Periode "
        . date('d-m-Y', strtotime($tgl_awal_history))
        . " s/d "
        . date('d-m-Y', strtotime($tgl_akhir_history));

} else {

    $judul_filter_history = "Semua Data";

}
?>


<!-- LOAD CHART.JS (CUKUP 1x) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">

    <!-- ============================= -->
    <!-- GRAFIK DOWNLOAD -->
    <!-- ============================= -->
    <div class="col-md-6">
        <div class="card card-outline card-primary">

            <div class="card-header">
                <h3 class="card-title">
                    Grafik Download Ebook Per Kategori
                </h3>
            </div>

            <form method="GET">
                <div class="row mb-3 p-2">
                    <div class="col-md-4">
                        <input type="date" name="tgl_awal_download" value="<?= $tgl_awal_download ?>"
                            class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="tgl_akhir_download" value="<?= $tgl_akhir_download ?>"
                            class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <canvas id="grafikDownload"></canvas>
            </div>
        </div>
    </div>

    <!-- ============================= -->
    <!-- GRAFIK BUKU & EBOOK -->
    <!-- ============================= -->
    <div class="col-md-6">
        <div class="card card-outline card-success">

            <div class="card-header">
                <h3 class="card-title">
                    Grafik Buku & Ebook per Kategori
                </h3>
            </div>

            <div class="card-body">
                <canvas id="grafikBukuEbook"></canvas>
            </div>

        </div>
    </div>

    <!-- ============================= -->
    <!-- GRAFIK PENGUNJUNG -->
    <!-- ============================= -->
    <div class="col-md-6">
        <div class="card card-outline card-warning">

            <div class="card-header">
                <h3 class="card-title">
                    Grafik Pengunjung (Registrasi)
                </h3>
            </div>

            <form method="GET">
                <div class="row p-2">
                    <div class="col-md-4">
                        <input type="date" name="tgl_awal_pengunjung" value="<?= $tgl_awal_pengunjung ?>"
                            class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="tgl_akhir_pengunjung" value="<?= $tgl_akhir_pengunjung ?>"
                            class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning">Filter</button>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <canvas id="grafikPengunjung"></canvas>
            </div>

        </div>
    </div>


    <!-- ============================= -->
    <!-- GRAFIK HISTORY-->
    <!-- ============================= -->
    <div class="col-md-6">

        <div class="card card-outline card-danger">

            <div class="card-header">

                <h3 class="card-title">
                    Grafik Riwayat Aktivitas
                </h3>

            </div>

            <form method="GET">

                <div class="row p-2">

                    <div class="col-md-4">
                        <input type="date" name="tgl_awal_history" value="<?= $tgl_awal_history ?>"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <input type="date" name="tgl_akhir_history" value="<?= $tgl_akhir_history ?>"
                            class="form-control">
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-danger">
                            Filter
                        </button>
                    </div>

                </div>

            </form>

            <div class="card-body">

                <canvas id="grafikHistory"></canvas>

            </div>

        </div>

    </div>

</div>

<script>
const labelDownload = <?= $label_download ?>;
const dataDownload = <?= $data_download ?>;

const labels = <?= $labels ?>;
const dataBuku = <?= $data_buku ?>;
const dataEbook = <?= $data_ebook ?>;

const labelPengunjung = <?= $label_pengunjung ?>;
const dataPengunjung = <?= $data_pengunjung ?>;

const judulFilterDownload = "<?= $judul_filter_download ?>";
const judulFilterBuku = "<?= $judul_filter_buku ?>";
const judulFilterPengunjung = "<?= $judul_filter_pengunjung ?>";

const labelAktivitas = <?= $label_aktivitas ?>;
const dataAktivitas = <?= $data_aktivitas ?>;

//const judulFilterHistory = "<?= $judul_filter_history ?>";
</script>

<script>
console.log(labelAktivitas);
console.log(dataAktivitas);
//console.log(judulFilterHistory);
</script>

<script src="<?= base_url('js/dashboard_admin.js') ?>"></script>