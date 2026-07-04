<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data <?= $judul ?></h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            <?php 
        if(session()->getFlashdata('pesan')){
            echo'<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> ';
            echo session()->getFlashdata('pesan');
            echo'</h5></div>';
        }
        ?>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Gambar Slider</th>
                        <th width="80px">Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                    foreach ($slider as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++ ?>.</td>
                    <td class="text-center"><img class="img-fluid" src="<?= base_url('slider/' . $value['slider']) ?>"
                            width="500px"></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-flat btn-sm" data-toggle="modal"
                            data-target="#modal-edit<?= $value['id_slider'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>

                    </td>
                </tr>
                <?php } ?>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modal Edit -->
<?php foreach ($slider as $key => $value) { ?>
<div class="modal fade" id="modal-edit<?= $value['id_slider'] ?>">
    <div class="modal-dialog modal-slg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $judul?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart(base_url('Pengaturan/EditSlider/'.$value['id_slider'])) ?>
                <div class="form-group">
                    <img class="img-fluid" id="gambar_load" src="<?= base_url('slider/' . $value['slider']) ?>"
                        width="800px">
                    <input type="file" class="form-control" name="slider" id="preview_gambar" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

<!-- template-->
<li class="nav-item dropdown">
    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="nav-link dropdown-toggle"> Penerbit
    </a>
    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <li><a href="#" class="dropdown-item">Some action</a></li>
        <li><a href="#" class="dropdown-item">Some other action</a></li>
        <!-- End Level two -->
    </ul>
</li>

<!--template admin-->
<li class="nav-item">
    <a href="<?= base_url('Pengaturan/Slider') ?>" class="nav-link <?= $submenu == 'slider' ? 'active' : '' ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Slider</p>
    </a>
</li>

<li class="nav-item">
    <a href="<?= base_url('Denda') ?>" class="nav-link <?= $submenu == 'denda' ? 'active' : '' ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>Denda</p>
    </a>
</li>




<!--home-->
<div class="col-md-12">
    <div class="card card-outline card-success shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-star text-warning"></i> Saran Pustakawan
            </h3>
            <span class="right badge badge-success">Rekomendasi</span>
        </div>

        <div class="card-body">
            <div class="row">

                <?php foreach ($buku as $value): ?>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('cover/' . $value['cover']) ?>" class="img-fluid rounded shadow-sm mb-2"
                            style="height:140px; object-fit:cover;">
                        <div class="small font-weight-bold text-truncate">
                            <?= $value['judul_buku'] ?>
                        </div>
                        <a href="<?= base_url('Home/DetailBuku/' . $value['id_buku']) ?>"
                            class="btn btn-xs btn-outline-success mt-1">
                            Detail
                        </a>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card card-outline card-primary shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-book"></i> Buku Baru
            </h3>
            <span class="right badge badge-primary">New</span>
        </div>

        <div class="card-body">
            <div class="row">

                <?php foreach ($buku as $value): ?>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('cover/' . $value['cover']) ?>" class="img-fluid rounded shadow-sm mb-2"
                            style="height:140px; object-fit:cover;">
                        <div class="small text-truncate">
                            <?= $value['judul_buku'] ?>
                        </div>
                        <a href="<?= base_url('Home/DetailBuku/' . $value['id_buku']) ?>"
                            class="btn btn-xs btn-outline-success mt-1">
                            Detail
                        </a>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card card-outline card-info shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-tablet-alt"></i> Ebook Baru
            </h3>
            <span class="right badge badge-info">Digital</span>
        </div>

        <div class="card-body">
            <div class="row">

                <?php foreach ($ebook as $value): ?>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="text-center mb-3">
                        <img src="<?= base_url('ebooks/' . $value['cover']) ?>" class="img-fluid rounded shadow-sm mb-2"
                            style="height:140px; object-fit:cover;">
                        <div class="small text-truncate">
                            <?= $value['judul_ebook'] ?>
                        </div>
                        <a href="<?= base_url('Home/DetailEbook/' . $value['id_ebook']) ?>"
                            class="btn btn-xs btn-outline-success mt-1">
                            Detail
                        </a>
                    </div>
                </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>


<!-- Grafik Jumlah Ebook Per Kategori -->
<?php
$label_kategori = $label_kategori ?? '[]';
$data_ebook = $data_ebook ?? '[]';
?>

<div class="col-md-6">
    <div class="card card-outline card-success">

        <div class="card-header">
            <h3 class="card-title">
                Grafik Jumlah Ebook per Kategori
            </h3>
        </div>

        <div class="card-body">
            <div style="height:300px;">
                <canvas id="grafikBar"></canvas>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var label = <?= $label ?>;
var dataEbook = <?= $data_ebook ?>;

var ctx = document.getElementById('grafikBar').getContext('2d');

var grafik = new Chart(ctx, {
    type: 'bar',

    data: {
        labels: label,
        datasets: [{
            label: 'Jumlah Ebook',
            data: dataEbook,

            // 👉 WARNA BERBEDA SETIAP BATANG
            backgroundColor: [
                '#007bff',
                '#28a745',
                '#ffc107',
                '#dc3545',
                '#17a2b8',
                '#6f42c1',
                '#fd7e14',
                '#20c997',
                '#6610f2',
                '#e83e8c',
                '#adb5bd',
                '#343a40',
                '#00c0ef'
            ],

            borderWidth: 1
        }]
    },

    options: {
        indexAxis: 'y', // horizontal biar rapi

        responsive: true,

        plugins: {
            legend: {
                display: false // 👉 legend bisa dimatikan karena sudah banyak warna
            }
        },

        scales: {
            x: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});