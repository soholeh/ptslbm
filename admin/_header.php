<?php require_once "_config/config.php";

if (isset($_SESSION['admin']) OR (isset($_SESSION['p_yuridus']) OR (isset($_SESSION['p_ukur']) OR (isset($_SESSION['p_desa']))))) { ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title?></title>
        <link href="<?= base_url('admin/_assets/dist/css/styles.css'); ?>" rel="stylesheet" />
        <link href="<?=base_url('admin/_assets/dataTables/Responsive-2.2.6/css/responsive.bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="<?=base_url('admin/_assets/dataTables/datatables.css')?>" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <!-- ikon -->
        <link rel="icon" href="<?=base_url('admin/_assets/bener.jpg')?>" type="image/gif" sizes="16x16">

    </head>
    <body class="sb-nav-fixed bg-light">
        <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
            <a class="navbar-brand text-center text-primary" href="<?=base_url('admin/data_desa/index.php')?>/"> Dashboard PTSL </br>
            Kabupaten Bener Meriah</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 ml-4" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
<!--                 <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                    <a class="nav-link" href="<?= base_url('admin/auth/logout.php');?>" role="button" onClick="return confirm('Yakin keluar dari Aplikasi?')"><i class="fas fa-sign-out-alt"></i></a>

            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <img class="rounded-circle img-thumbnail m-auto mb-2" src="<?= base_url('admin/_assets/bener.jpg');?>" alt="" width="110" height="110">
                            <!-- <div class="sb-sidenav-menu-heading">Navigasi Utama</div> -->
                            <a class="nav-link bg-danger text-white" href="<?= base_url('admin/data_desa');?>">
                                <div class="sb-nav-link-icon"></div>
                                Entri Desa
                            </a>
                            <a class="nav-link bg-danger text-white" href="<?= base_url('admin/data_proyek');?>">
                                <div class="sb-nav-link-icon"></div>
                                Entri Proyek
                            </a>
                            <a class="nav-link bg-danger text-white" href="<?= base_url('admin/data_user');?>">
                                <div class="sb-nav-link-icon"></div>
                                Entri User
                            </a>
                            <a class="nav-link bg-danger text-white" href="<?= base_url('admin/data_panitia_ajudikasi');?>">
                                <div class="sb-nav-link-icon"></div>
                                Entri Panitia Ajudikasi
                            </a>
                            <a class="nav-link bg-danger text-white" href="<?= base_url('admin/data_penlok');?>">
                                <div class="sb-nav-link-icon"></div>
                                Entri Penlok
                            </a>
                           
                            <a class="nav-link collapsed bg-info text-white" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"></div>
                                Pengumpulan Data
                                <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link bg-info text-white" href="<?= base_url('admin/info_berkas');?>">
                                        <div class="sb-nav-link-icon"></div>
                                        Informasi Berkas
                                    </a>
                                    <a class="nav-link bg-info text-white" href="<?= base_url('admin/pemb_berkas');?>">
                                        <div class="sb-nav-link-icon"></div>
                                        Pembuatan Berkas
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link bg-danger text-white" href="<?= base_url('admin/pelaporan');?>">
                                <div class="sb-nav-link-icon"></div>
                                Pelaporan
                            </a>
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link bg-danger text-white" href="<?= base_url('admin/pelaporan/pelaporan_pengukuran');?>">
                                        <div class="sb-nav-link-icon"></div>
                                        Pelaporan Pengukuran
                                    </a>
                                    <a class="nav-link bg-danger text-white" href="<?= base_url('admin/pelaporan/pelaporan_yuridis');?>">
                                        <div class="sb-nav-link-icon"></div>
                                        Pelaporan Yuridis
                                    </a>
                                </nav>

                            <!-- <a class="nav-link" href="<?= base_url('admin/grafik/data.php');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar mr-2"></i></div>
                                Grafik Stok Menu
                            </a> -->
                            <!-- <?php if (isset($_SESSION["admin"])): ?>
                                <a class="nav-link" href="<?= base_url('admin/slider/data.php');?>">
                                    <div class="sb-nav-link-icon"><i class="fas fa-angle-left"></i><i class="fas fa-angle-right mr-2"></i></div>
                                    Kelola Slider
                                </a>
                            <?php endif ?> -->
                            <!-- <a class="nav-link" href="<?= base_url('admin/atur/edit.php');?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs mr-1"></i></div>
                                Pengaturan
                            </a>
                            <a class="nav-link" href="<?= base_url('admin/auth/logout.php');?>" onClick="return confirm('Yakin keluar dari Ge-Ju?')">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt mr-2"></i></div>
                                Logout
                            </a> -->
                    </div>
 <!--                    <div class="sb-sidenav-footer fixed-bottom">
                        <div class="small">Logged in as:</div>
                        <?php if (isset($_SESSION["admin"])): ?>
                        <?= $_SESSION["admin"]["nama_user"];?>
                        <?php endif ?>
                        <?php if (isset($_SESSION["pemilik"])): ?>
                        <?= $_SESSION["pemilik"]["nama_user"];?>
                        <?php endif ?>
                    </div> -->
                </nav>
            </div>
<?php 
} else {
    header("location: ../auth/login.php");
}
?>
