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

</div>

</div>

<script>
console.log("Download:", <?= $label_download ?>, <?= $data_download ?>);
console.log("Pengunjung:", <?= $label_pengunjung ?>, <?= $data_pengunjung ?>);

/* =============================
GRAFIK DOWNLOAD
============================= */
const labelDownload = <?= $label_download ?>;
const dataDownload = <?= $data_download ?>;

const downloadColors = [
    '#4CAF50', '#2196F3', '#FFC107', '#FF5722',
    '#9C27B0', '#00BCD4', '#E91E63', '#8BC34A',
    '#FF9800', '#3F51B5'
];

new Chart(document.getElementById('grafikDownload'), {
    type: 'bar',
    data: {
        labels: labelDownload,
        datasets: [{
            label: 'Jumlah Download',
            data: dataDownload,
            backgroundColor: downloadColors.slice(0, dataDownload.length),
            borderColor: '#ffffff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Grafik Download Ebook (<?= $judul_filter_download ?>)',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Kategori Ebook'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                },
                title: {
                    display: true,
                    text: 'Jumlah Download'
                }
            }
        }
    }
});


/* =============================
GRAFIK BUKU & EBOOK
============================= */
const labels = <?= $labels ?>;
const dataBuku = <?= $data_buku ?>;
const dataEbook = <?= $data_ebook ?>;

new Chart(document.getElementById('grafikBukuEbook'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
                label: 'Jumlah Buku',
                data: dataBuku,
                backgroundColor: '#007bff',
                borderColor: '#0056b3',
                borderWidth: 2
            },
            {
                label: 'Jumlah Ebook',
                data: dataEbook,
                backgroundColor: '#28a745',
                borderColor: '#1e7e34',
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: 'Grafik Buku & Ebook per Kategori (<?= $judul_filter_buku ?>)',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Kategori'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                },
                title: {
                    display: true,
                    text: 'Jumlah Data'
                }
            }
        }
    }
});


/* =============================
GRAFIK PENGUNJUNG
============================= */
const labelPengunjung = <?= $label_pengunjung ?>;
const dataPengunjung = <?= $data_pengunjung ?>;

new Chart(document.getElementById('grafikPengunjung'), {
    type: 'bar',
    data: {
        labels: labelPengunjung,
        datasets: [{
            label: 'Jumlah Pengunjung Daftar',
            data: dataPengunjung,
            backgroundColor: '#ffc107',
            borderColor: '#ff9800',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            title: {
                display: true,
                text: 'Grafik Pengunjung (<?= $judul_filter_pengunjung ?>)',
                font: {
                    size: 16
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Tanggal Registrasi'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                },
                title: {
                    display: true,
                    text: 'Jumlah Pengunjung'
                }
            }
        }
    }
});
</script>