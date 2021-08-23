<?php $title = "Dashboard";
include_once('../_header.php'); 

if (isset($_SESSION['admin']) OR isset($_SESSION['p_ukur']) OR isset($_SESSION['p_yuridis']) OR isset($_SESSION['p_desa'])) { ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <img class="rounded-circle img-thumbnail m-auto mb-1 mx-auto d-block" src="<?= base_url('admin/_assets/bener.jpg');?>" alt="" width="110" height="110">
                        <h3 class='text-center mt-2'>Selamat Datang di Pelayanan Pertanahan Desa Mandiri</h3>
                    </div>
                </main>

<?php include_once('../_footer.php'); ?>


<?php 
} else {
    header("location: ../auth/login.php");
}
?>