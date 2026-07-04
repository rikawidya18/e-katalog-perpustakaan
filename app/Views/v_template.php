<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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

<body class="hold-transition layout-top-nav">
    <?php
    $db = \Config\Database::connect();
    $web = $db->table('tbl_web')
        ->where('id_web', 1)
        ->get()->getRowArray();
    ?>

    <?php
    $level = session()->get('level');
    $nama_user = session()->get('nama_user');
    $nama_pengunjung = session()->get('nama_pengunjung');
    ?>

    <div class="wrapper">


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">

                <!-- Brand -->
                <a href="<?= base_url() ?>" class="navbar-brand d-flex align-items-center">

                    <!-- Logo -->
                    <img src="<?= base_url('logo/' . $web['logo']) ?>" alt="Logo"
                        class="brand-image img-circle elevation-2 mr-2"
                        style="width:55px; height:55px; object-fit:cover;">

                    <!-- Nama Perpustakaan (2 baris) -->
                    <div class="brand-text" style="line-height:1.1; font-size:17px;">
                        <b>Perpustakaan</b><br>
                        <b>Museum Negeri NTB</b>
                    </div>

                </a>

                <!-- Button toggle -->
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Content -->
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <!-- Left menu -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url('/') ?>" class="nav-link">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle"> Galeri
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('Home/GaleriBuku') ?>" class="dropdown-item">Buku</a></li>
                                <li><a href="<?= base_url('Home/GaleriEbook') ?>" class="dropdown-item">E-Book</a></li>
                                <!-- End Level two -->
                            </ul>
                        </li>


                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle"> Profil
                            </a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="<?= base_url('Home/Sejarah') ?>" class="dropdown-item">Sejarah</a></li>
                                <li><a href="<?= base_url('Home/VisiMisi') ?>" class="dropdown-item">Visi & Misi</a>
                                </li>
                                <!-- End Level two -->
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('Home/About') ?>" class="nav-link">About Me</a>
                        </li>
                    </ul>

                </div>

                <!-- Right side -->
                <ul class="navbar-nav ml-auto order-2 order-md-3">

                    <?php if ($level == 'Admin' || $level == 'Petugas') { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="fas fa-user"></i> <?= $nama_user ?>
                        </a>

                        <div class="dropdown-menu">
                            <a href="<?= base_url('Admin') ?>" class="dropdown-item">Dashboard</a>
                            <a href="<?= base_url('Auth/LogOut') ?>" class="dropdown-item">Logout</a>
                        </div>
                    </li>

                    <?php } elseif ($level == 'Pengunjung') { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="fas fa-users"></i> <?= $nama_pengunjung ?>
                        </a>

                        <div class="dropdown-menu">
                            <a href="<?= base_url('DashboardPengunjung/EditProfile') ?>" class="dropdown-item">
                                Edit Profile
                            </a>
                            <a href="<?= base_url('Auth/LogOutPengunjung') ?>" class="dropdown-item">
                                Logout
                            </a>
                        </div>
                    </li>

                    <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Auth') ?>">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>

                    <?php } ?>

                </ul>

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">

                        <?php
                        if ($page) {
                            echo view($page, [
                                'kategori' => $kategori ?? [],
                                'judul' => $judul ?? ''
                            ]);
                        }
                        ?>


                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url() ?>">
                    <?= $web['nama_perpus'] ?></a>.</strong>
            All
            rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/demo.js"></script>
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
    $(function() {
        $("#example1").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example2").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        $('#example3').DataTable({
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
</body>

</html>