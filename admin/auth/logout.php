<?php
require_once "../_config/config.php";

unset($_SESSION['admin']);
unset($_SESSION['p_yuridis']);
unset($_SESSION['p_ukur']);
unset($_SESSION['p_desa']);
// session_destroy();
echo "<script>window.location='".base_url('admin/auth/login.php')."';</script>";
?> 