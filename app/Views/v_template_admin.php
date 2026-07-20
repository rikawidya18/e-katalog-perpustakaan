<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIE-K | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <?php

    use App\Controllers\Admin;

    $db = \Config\Database::connect();
    $web = $db->table('tbl_web')
        ->where('id_web', 1)
        ->get()->getRowArray();

    $user = $db->table('tbl_user')
        ->where('id_user', session()->get('id_user'))
        ->get()->getRowArray();
    ?>

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h3><b><?= $web['nama_perpus'] ?></b></h3>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/LogOut') ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link">
                <img src="<?= base_url('logo/' . $web['logo']) ?>" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Perpustakaan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('AdminLTE') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $user['nama_user'] ?></a>
                        <?php
                        if ($user['level'] == 'Admin') {
                            echo ' <a class="text-success"><i class="fas fa-check-circle"></i> Admin</a> ';
                        } else {
                            echo ' <a class="text-success"><i class="fas fa-check-circle"></i> Petugas</a> ';
                        }
                        ?>
                    </div>
                </div>

                <!-- Sidebar Search Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin') ?>"
                                class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Master Buku -->
                        <li class="nav-item <?= $menu == 'masterbuku' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterbuku' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Master Buku
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= base_url('Buku') ?>"
                                        class="nav-link <?= $submenu == 'buku' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buku</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Ebook') ?>"
                                        class="nav-link <?= $submenu == 'ebook' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>E-Book</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Kategori') ?>"
                                        class="nav-link <?= $submenu == 'kategori' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Rak') ?>"
                                        class="nav-link <?= $submenu == 'rak' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Rak</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Penerbit') ?>"
                                        class="nav-link <?= $submenu == 'penerbit' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penerbit</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Pengarang') ?>"
                                        class="nav-link <?= $submenu == 'pengarang' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengarang</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Download') ?>"
                                        class="nav-link <?= $submenu == 'download' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Download</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('History') ?>"
                                        class="nav-link <?= $submenu == 'history' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Riwayat Aktivitas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Master Pengunjung -->
                        <li class="nav-item <?= $menu == 'masterpengunjung' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterpengunjung' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Master Pengunjung
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Pengunjung') ?>"
                                        class="nav-link <?= $submenu == 'pengunjung' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pengunjung</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Kelas') ?>"
                                        class="nav-link <?= $submenu == 'kelas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php if (session()->get('level') == 'Admin') { ?>

                        <!-- Pengaturan -->
                        <li class="nav-item <?= $menu == 'pengaturan' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'pengaturan' ? 'active' : '' ?>">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>
                                    Pengaturan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('User') ?>"
                                        class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('Pengaturan/web') ?>"
                                        class="nav-link <?= $submenu == 'web' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Web</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <?php } ?>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php if ($page)
                            echo view($page); ?>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">Anything you want</div>
            <strong>
                Copyright &copy; <?= date('Y') ?>
                <a href="<?= base_url() ?>"><?= $web['nama_perpus'] ?></a>.
            </strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- JQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
    function formatTanggal(tanggal) {

        var t = new Date(tanggal);

        var hari = String(t.getDate()).padStart(2, '0');
        var bulan = String(t.getMonth() + 1).padStart(2, '0');
        var tahun = t.getFullYear();

        return hari + '-' + bulan + '-' + tahun;
    }

    function getJudulLaporan() {

        const params = new URLSearchParams(window.location.search);

        var tgl_awal = params.get('tgl_awal');
        var tgl_akhir = params.get('tgl_akhir');

        var judul = 'Laporan <?= $judul ?>';

        if (tgl_awal && tgl_akhir) {

            return judul +
                ' Tanggal ' +
                formatTanggal(tgl_awal) +
                ' s/d ' +
                formatTanggal(tgl_akhir);

        } else {

            return judul;
        }
    }

    $(function() {

        $("#example1").DataTable({

            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

            "buttons": [

                {
                    extend: 'csv',
                    title: getJudulLaporan
                },

                {
                    extend: 'excel',
                    title: getJudulLaporan
                },

                {
                    extend: 'pdf',

                    title: getJudulLaporan,

                    orientation: 'landscape',

                    pageSize: 'A3',

                    exportOptions: {
                        columns: ':visible'
                    },

                    customize: function(doc) {

                        doc.defaultStyle.fontSize = 8;
                        doc.styles.tableHeader.fontSize = 9;

                        doc.pageMargins = [10, 10, 10, 10];

                        var objLayout = {};

                        objLayout['hLineWidth'] = function(i) {
                            return .5;
                        };

                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };

                        objLayout['hLineColor'] = function(i) {
                            return '#aaa';
                        };

                        objLayout['vLineColor'] = function(i) {
                            return '#aaa';
                        };

                        objLayout['paddingLeft'] = function(i) {
                            return 4;
                        };

                        objLayout['paddingRight'] = function(i) {
                            return 4;
                        };

                        doc.content[1].layout = objLayout;
                    }
                },

                {
                    extend: 'print',
                    title: getJudulLaporan
                },

                "colvis"
            ]

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');



        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    });
    </script>

    <script>
    $('#filter').click(function() {

        var tgl_awal = $('#tgl_awal').val();
        var tgl_akhir = $('#tgl_akhir').val();

        if (tgl_awal == '' || tgl_akhir == '') {
            alert('Tanggal harus diisi!');
            return;
        }

        var url = window.location.pathname + '/filter';

        window.location.href =
            url +
            '?tgl_awal=' + tgl_awal +
            '&tgl_akhir=' + tgl_akhir;
    });
    </script>

    <script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
    </script>

</body>

</html>