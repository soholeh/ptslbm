<?php
require_once "_config/config.php";
if (isset($_SESSION['admin'])) {
    echo "<script>window.location='".base_url('admin/data_desa')."';</script>";
} else if (isset($_SESSION['p_apalah'])) {
	echo "<script>window.location='".base_url('admin/pemb_berkas')."';</script>";
} else if (isset($_SESSION['p_yuridis'])) {
	echo "<script>window.location='".base_url('admin/pemb_berkas')."';</script>";
} else if (isset($_SESSION['p_ukur'])) {
	echo "<script>window.location='".base_url('admin/pemb_berkas')."';</script>";
} else if (isset($_SESSION['p_desa'])) {
	echo "<script>window.location='".base_url('admin/pemb_berkas')."';</script>";
} else {
    echo "<script>window.location='".base_url('admin/auth/login.php')."';</script>";
}
?> 
