<?php $title = "Entri Bukti Alas Hak";
include_once('../../../_header.php');

?>

			<div id="layoutSidenav_content">
                <main>
                    <?php 
                    // if (!isset($_SESSION['admin'])) {
                    //     echo    "<script>
                    //             alert('Anda Bukan Admin');
                    //             location='../menu/data.php';
                    //         </script>";
                    //     } 
                     ?>
                    <div class="container-fluid">
                        <p cl>Entri Data Bukti Alas Hak Nomor Berkas :</p>
                        




<?php

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$id_jah = $_POST['id_jah'];
		$id_klaster = $_POST['id_klaster'];
		$id_ss = $_POST['id_ss'];
		$nama_alas_hak = $_POST['nama_alas_hak'];
		$no_alas_hak = $_POST['no_alas_hak'];
		$tgl_alas_hak = $_POST['tgl_alas_hak'];
		$pembuat_alas_hak = $_POST['pembuat_alas_hak'];
		$luas_yang_dimohon = $_POST['luas_yang_dimohon'];
		$utara = $_POST['utara'];
		$timur = $_POST['timur'];
		$selatan = $_POST['selatan'];
		$barat = $_POST['barat'];
		$harga = $_POST['harga'];
		$nama_almarhum = $_POST['nama_almarhum'];
		$tgl_meninggal = $_POST['tgl_meninggal'];
		$desa_meninggal = $_POST['desa_meninggal'];
		$kecamatan_meninggal = $_POST['kecamatan_meninggal'];
		$kabupaten_meninggal = $_POST['kabupaten_meninggal'];
		$desa_akhir = $_POST['desa_akhir'];
		$kecamatan_akhir = $_POST['kecamatan_akhir'];
		$kabupaten_akhir = $_POST['kabupaten_akhir'];
		$kawin_dengan = $_POST['kawin_dengan'];

		
		if(!empty($id_jah) && !empty($id_klaster) && !empty($id_ss)){

			$sql ="INSERT INTO bukti_alas_hak
            (id_jah,id_klaster,id_ss,nama_alas_hak,nomor_alas_hak,tgl_alas_hak,pembuat_alas_hak,luas_yang_dimohon,bt_utara,bt_timur,bt_selatan,bt_barat,harga_bah,nama_alm,tgl_alm,desa_alm,kecamatan_alm,kabupaten_alm,desa_akhir,kecamatan_akhir,kabupaten_akhir,kawin_dengan)
            VALUES('$id_jah','$id_klaster','$id_ss','$nama_alas_hak','$no_alas_hak','$tgl_alas_hak','$pembuat_alas_hak','$luas_yang_dimohon','$utara','$timur','$selatan','$barat','$harga','$nama_almarhum','$tgl_meninggal','$desa_meninggal','$kecamatan_meninggal','$kabupaten_meninggal','$desa_akhir','$kecamatan_akhir','$kabupaten_akhir','$kawin_dengan')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					echo "<meta http-equiv='refresh' content='1;url=entri_bukti_alas_hak.php'>";
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 
	<div class="row" style="margin-top: -200px;">
		<div class="col-xl-12">
		<form action="" method="POST">
			<div class="form-row">
					<fieldset>
						<div class="table-responsive">
							<table class="table table-responsive-sm table-hover" border="0">
								<tr>
									<td colspan="12">
										<ol class="breadcrumb mb-0">
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas');?>"> Berkas</a>
				                            </li>
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen');?>"> Dokumen</a>
				                            </li>
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen/entri/entri_pemohon.php');?>"> Entri</a>
				                            </li>
				                            	<div class="dropdown m-auto">
												  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    Menu
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <a class="dropdown-item" href="#">Cetak</a>
												    <a class="dropdown-item" href="#">Permohonan</a>
												    <a class="dropdown-item" href="#">Sporadik</a>
												    <a class="dropdown-item" href="#">Jual Beli</a>
												    <a class="dropdown-item" href="#">Hibah</a>
												    <a class="dropdown-item" href="#">Surat Keterangan Ganti Usaha</a>
												    <a class="dropdown-item" href="#">Sanggahan</a>
												  </div>
												</div>
				                        </ol>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Jenis Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select id="txtPassportNumber"  name="id_jah" required onchange="EnableDisable(this)">
									        	<?php 
													$datajenis_alas_hak = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_alas_hak");
													while ($jenis_alas_hak = mysqli_fetch_assoc($sql)) {
													    $datajenis_alas_hak[] = $jenis_alas_hak;
													}
												?>
									            <option  disabled selected value="">-Pilih Jenis Alas Hak-</option>
									            <?php foreach ($datajenis_alas_hak as $key => $value):?>
									            <option value="<?= $value["id_jah"] ?>"><?= $value["nama_jah"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
										<input id="btnSubmit" disabled="disabled" type="button" onclick="location.href='entri_saksi.php';" value="Entri Saksi"/>
										
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Klaster</td>
									</div>
									<style type="text/css">
										select {
											    width: 170px;
											}
										input[type="text"] {
											    width: 170px;
											}
										input[type="number"] {
											    width: 170px;
											}
											input[type="email"] {
											    width: 190px;
											}
									</style>
									<div class="col-md-3">
										<td> : 
											<select name="id_klaster" required>
									        	<?php 
													$datajenis_klaster = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM klaster");
													while ($jenis_klaster = mysqli_fetch_assoc($sql)) {
													    $datajenis_klaster[] = $jenis_klaster;
													}
												?>
									            <option disabled selected value="">-Pilih Klaster-</option>
									            <?php foreach ($datajenis_klaster as $key => $value):?>
									            <option value="<?= $value["id_klaster"] ?>"><?= $value["nama_klaster"] ?> = <?= $value["keterangan_klaster"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama Saksi
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Status Surat</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_ss" required>
									        	<?php 
													$datajenis_status_surat = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM status_surat");
													while ($jenis_status_surat = mysqli_fetch_assoc($sql)) {
													    $datajenis_status_surat[] = $jenis_status_surat;
													}
												?>
									            <option disabled selected value="">-Pilih Status Surat-</option>
									            <?php foreach ($datajenis_status_surat as $key => $value):?>
									            <option value="<?= $value["id_ss"] ?>"><?= $value["nama_ss"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<?php 
											$sql = "SELECT * FROM saksi LEFT JOIN jenis_kelamin ON saksi.id_jk = jenis_kelamin.id_jk";
											$query = mysqli_query($koneksi, $sql);
										 ?>
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama_alas_hak">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nomor Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="no_alas_hak">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_pihak_pertama.php" class="btn btn-secondary">Entri Pihak I</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="date" name="tgl_alas_hak">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama Pihak I (Pertama)
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Pembuat Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="pembuat_alas_hak">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<?php 
											$sql = "SELECT * FROM saksi LEFT JOIN jenis_kelamin ON saksi.id_jk = jenis_kelamin.id_jk";
											$query = mysqli_query($koneksi, $sql);
										 ?>
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Luas Yang Dimohon</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="luas_yang_dimohon">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Batas Tanah :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_persetujuan_keluarga.php" class="btn btn-secondary">Persetujuan Keluarga</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Utara</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="utara">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama Keluarga
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Timur</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="timur">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Selatan</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="selatan">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											2.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Barat</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="barat">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											3.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>

										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											4.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Harga</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="number" name="harga">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											5.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_kuasa.php" class="btn btn-secondary">Penerima Kuasa</a>
										</td>
									</div>			
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
											<input type="emai" readonly disabled>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											6.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Almarhum</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nama_almarhum">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Meninggal :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_ahli_waris.php" class="btn btn-secondary">Ahli Waris</a>
										</td>
									</div>	
									<div class="col-md-1">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href=""></a>
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_penyanggah.php" class="btn btn-secondary">Penyanggah</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tgl_meninggal">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											Nama Ahli Waris
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											Umur
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>
									<div class="col-md-3">
										<td>

										</td>
									</div>	
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											Nama Penyanggah
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Desa</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="desa_meninggal">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kecamatan</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kecamatan_meninggal">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											2.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kabupaten</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kabupaten_meninggal">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											3.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tinggal Terakhir di :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											4.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Desa</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="desa_akhir">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											5.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kecamatan</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kecamatan_akhir">
										</td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kabupaten</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kabupaten_akhir">
										</td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Perkawinan Dengan</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kawin_dengan">
										</td>
									</div>
								</tr>
								<tr>
									<td></td>
									<td><label class="ml-2">
									<input type="submit" name="btn_simpan" value="Simpan"/>
									<input type="reset" name="reset" value="Besihkan"/>
								</label></td>
								</tr>

							</table>
							<br>
							<?php 
		// echo "<pre>";
		// print_r($datadesa);
		// echo "</pre>";
							 ?>
						</div>

					<p><?php echo isset($pesan) ? $pesan : "" ?></p>
				</fieldset>
			</div>
		</form>
	</div>
	
	</div>
                        <div class="row">

                        	<div class="col-xl-auto offset-xl-1">		

	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM bukti_alas_hak LEFT JOIN jenis_alas_hak ON bukti_alas_hak.id_jah = jenis_alas_hak.id_jah 
	LEFT JOIN klaster ON bukti_alas_hak.id_klaster = klaster.id_klaster 
	LEFT JOIN status_surat ON bukti_alas_hak.id_ss = status_surat.id_ss";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr>";
			echo "<th>No</th>
				<th>Nama Pemohon</th>
				<th>Jenis Alas Hak</th>
				<th>Nama Alas Hak</th>
				<th>Nomor Alas Hak</th>
				<th>Tanggal Alas Hak</th>
				<th>Nama Pihak I</th>
				<th>Luas Yang Dimohon</th>
				<th>Edit</th>
				<th>Hapus</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_alas_hak']; ?></td>
				<td><?php echo $data['nama_jah']; ?></td>
				<td><?php echo $data['nama_alas_hak']; ?></td>
				<td><?php echo $data['nomor_alas_hak']; ?></td>
				<td><?php echo $data['tgl_alas_hak']; ?></td>
				<td><?php echo $data['pembuat_alas_hak']; ?></td>
				<td><?php echo $data['luas_yang_dimohon']; ?></td>
				<td>
					<a href="entri_bukti_alas_hak.php?aksi=update&id=<?php echo $data['id_bah']; ?>&id_jah=<?php echo $data['id_jah']; ?>&id_klaster=<?php echo $data['id_klaster']; ?>&id_ss=<?php echo $data['id_ss']; ?>&nama_alas_hak=<?php echo $data['nama_alas_hak']; ?>&nomor_alas_hak=<?php echo $data['nomor_alas_hak']; ?>&tgl_alas_hak=<?php echo $data['tgl_alas_hak']; ?>&pembuat_alas_hak=<?php echo $data['pembuat_alas_hak']; ?>&luas_yang_dimohon=<?php echo $data['luas_yang_dimohon']; ?>&bt_utara=<?php echo $data['bt_utara']; ?>&bt_timur=<?php echo $data['bt_timur']; ?>&bt_selatan=<?php echo $data['bt_selatan']; ?>&bt_barat=<?php echo $data['bt_barat']; ?>&harga_bah=<?php echo $data['harga_bah']; ?>&nama_alm=<?php echo $data['nama_alm']; ?>&tgl_alm=<?php echo $data['tgl_alm']; ?>&desa_alm=<?php echo $data['desa_alm']; ?>&kecamatan_alm=<?php echo $data['kecamatan_alm']; ?>&kabupaten_alm=<?php echo $data['kabupaten_alm']; ?>&desa_akhir=<?php echo $data['desa_akhir']; ?>&kecamatan_akhir=<?php echo $data['kecamatan_akhir']; ?>&kabupaten_akhir=<?php echo $data['kabupaten_akhir']; ?>&kawin_dengan=<?php echo $data['kawin_dengan']; ?>">Edit</a>
				</td>
				<td>
					<a href="entri_bukti_alas_hak.php?aksi=delete&id=<?php echo $data['id_bah']; ?>" onClick="return confirm('Yakin akan menghapus Bukti Alas Hak <?= $data['nama_alas_hak']; ?>?')">Hapus</a>
				</td>
			</tr>
		<?php
	}
	echo "</tbody>";
	echo "</table>";
	echo "</fieldset>";
	echo "</br>";
	echo "</br>";
	echo "</br>";
}
// --- Tutup Fungsi Baca Data (Read)


// --- Fungsi Ubah Data (Update)
function ubah($koneksi){

	// ubah data
	if(isset($_POST['btn_ubah'])){
		$id_bah = $_POST['id_bah'];
		$id_jah = $_POST['id_jah'];
		$id_klaster = $_POST['id_klaster'];
		$id_ss = $_POST['id_ss'];
		$nama_alas_hak = $_POST['nama_alas_hak'];
		$no_alas_hak = $_POST['no_alas_hak'];
		$tgl_alas_hak = $_POST['tgl_alas_hak'];
		$pembuat_alas_hak = $_POST['pembuat_alas_hak'];
		$luas_yang_dimohon = $_POST['luas_yang_dimohon'];
		$utara = $_POST['utara'];
		$timur = $_POST['timur'];
		$selatan = $_POST['selatan'];
		$barat = $_POST['barat'];
		$harga = $_POST['harga'];
		$nama_almarhum = $_POST['nama_almarhum'];
		$tgl_meninggal = $_POST['tgl_meninggal'];
		$desa_meninggal = $_POST['desa_meninggal'];
		$kecamatan_meninggal = $_POST['kecamatan_meninggal'];
		$kabupaten_meninggal = $_POST['kabupaten_meninggal'];
		$desa_akhir = $_POST['desa_akhir'];
		$kecamatan_akhir = $_POST['kecamatan_akhir'];
		$kabupaten_akhir = $_POST['kabupaten_akhir'];
		$kawin_dengan = $_POST['kawin_dengan'];

		
		if(!empty($id_jah) && !empty($id_klaster) && !empty($id_ss)){
			$sql_update = "UPDATE bukti_alas_hak SET id_jah='$id_jah', id_klaster='$id_klaster',
	            id_ss='$id_ss',
	            nama_alas_hak='$nama_alas_hak', nomor_alas_hak='$no_alas_hak', tgl_alas_hak='$tgl_alas_hak',
	            pembuat_alas_hak='$pembuat_alas_hak', luas_yang_dimohon='$luas_yang_dimohon', bt_utara='$utara', bt_timur='$timur', bt_selatan='$selatan', bt_barat='$barat', harga_bah='$harga',
	            nama_alm='$nama_almarhum', tgl_alm='$tgl_meninggal', desa_alm='$desa_meninggal', kecamatan_alm='$kecamatan_meninggal', kabupaten_alm='$kabupaten_meninggal', desa_akhir='$desa_akhir', kecamatan_akhir='$kecamatan_akhir', kabupaten_akhir='$kabupaten_akhir', kawin_dengan='$kawin_dengan' WHERE id_bah=$id_bah";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
					echo "<meta http-equiv='refresh' content='1;url=entri_bukti_alas_hak.php'>";
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){

		?>
			
			<form action="" method="POST" style="margin-top: -200px;">
			<fieldset>
				<div class="table-responsive">
					<table class="table table-responsive-sm table-hover" border="0">
						<tr>
							<td>	
								<input type="hidden" name="id_bah" value="<?php echo $_GET['id'] ?>"/>
							</td>
						</tr>
						<tr>
							<td colspan="12">
								<a href="entri_bukti_alas_hak.php"> &laquo; Kembali</a> 
							</td>
						</tr>
						<tr>
							<td colspan="12">
								<h3>Ubah Data</h3>
							</td>
						</tr>
								<tr>
									<td colspan="12">
										<ol class="breadcrumb mb-0">
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas');?>"> Berkas</a>
				                            </li>
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen');?>"> Dokumen</a>
				                            </li>
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen/entri/entri_pemohon.php');?>"> Entri</a>
				                            </li>
				                            	<div class="dropdown m-auto">
												  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												    Menu
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <a class="dropdown-item" href="#">Cetak</a>
												    <a class="dropdown-item" href="#">Permohonan</a>
												    <a class="dropdown-item" href="#">Sporadik</a>
												    <a class="dropdown-item" href="#">Jual Beli</a>
												    <a class="dropdown-item" href="#">Hibah</a>
												    <a class="dropdown-item" href="#">Surat Keterangan Ganti Usaha</a>
												    <a class="dropdown-item" href="#">Sanggahan</a>
												  </div>
												</div>
				                        </ol>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Jenis Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_jah" required>
								        	<?php 
									        	$datajenis_alas_hak = array();
												$sql = mysqli_query($koneksi, "SELECT * FROM jenis_alas_hak");
												while ($jenis_alas_hak = mysqli_fetch_assoc($sql)) {
												    $datajenis_alas_hak[] = $jenis_alas_hak;
												}
													$sql = "SELECT * FROM bukti_alas_hak WHERE id_bah='$_GET[id]'";
													$result = mysqli_query($koneksi, $sql);

													$jenis_alas_hak = mysqli_fetch_assoc($result);
									        	 ?>
									            <option disabled value="">-Pilih Jenis Alas Hak-</option>
									            <?php foreach ($datajenis_alas_hak as $key => $value):?>
									            <option value="<?= $value["id_jah"] ?>" <?php if($jenis_alas_hak["id_jah"]==$value["id_jah"]){ echo "selected"; } ?> >
									            <?= $value["nama_jah"] ?>
									            </option>
									        	<?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_saksi.php" class="btn btn-secondary">Entri Saksi</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Klaster</td>
									</div>
									<style type="text/css">
										select {
											    width: 170px;
											}
										input[type="text"] {
											    width: 170px;
											}
										input[type="number"] {
											    width: 170px;
											}
											input[type="email"] {
											    width: 190px;
											}
									</style>
									<div class="col-md-3">
										<td> : 
											<select name="id_klaster" required>
								        	<?php 
									        	$dataklaster = array();
												$sql = mysqli_query($koneksi, "SELECT * FROM klaster");
												while ($klaster = mysqli_fetch_assoc($sql)) {
												    $dataklaster[] = $klaster;
												}
													$sql = "SELECT * FROM bukti_alas_hak WHERE id_bah='$_GET[id]'";
													$result = mysqli_query($koneksi, $sql);

													$klaster = mysqli_fetch_assoc($result);
									        	 ?>
									            <option disabled value="">-Pilih Klaster-</option>
									            <?php foreach ($dataklaster as $key => $value):?>
									            <option value="<?= $value["id_klaster"] ?>" <?php if($klaster["id_klaster"]==$value["id_klaster"]){ echo "selected"; } ?> >
									            <?= $value["nama_klaster"] ?> = <?= $value["keterangan_klaster"] ?>
									            </option>
									        	<?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama Saksi
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Status Surat</td>
									</div>
									<div class="col-md-3">
										<td> :
										<select name="id_ss" required>
								        	<?php 
									        	$datastatus_surat = array();
												$sql = mysqli_query($koneksi, "SELECT * FROM status_surat");
												while ($status_surat = mysqli_fetch_assoc($sql)) {
												    $datastatus_surat[] = $status_surat;
												}
													$sql = "SELECT * FROM bukti_alas_hak WHERE id_bah='$_GET[id]'";
													$result = mysqli_query($koneksi, $sql);

													$status_surat = mysqli_fetch_assoc($result);
									        	 ?>
									            <option disabled value="">-Pilih Status Surat-</option>
									            <?php foreach ($datastatus_surat as $key => $value):?>
									            <option value="<?= $value["id_ss"] ?>" <?php if($status_surat["id_ss"]==$value["id_ss"]){ echo "selected"; } ?> >
									            <?= $value["nama_ss"] ?>
									            </option>
									        	<?php endforeach ?>
											</select> 
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<?php 
											$sql = "SELECT * FROM saksi LEFT JOIN jenis_kelamin ON saksi.id_jk = jenis_kelamin.id_jk";
											$query = mysqli_query($koneksi, $sql);
										 ?>
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama_alas_hak" value="<?php echo $_GET['nama_alas_hak'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nomor Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="no_alas_hak" value="<?php echo $_GET['nomor_alas_hak'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_pihak_pertama.php" class="btn btn-secondary">Entri Pihak I</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="date" name="tgl_alas_hak" value="<?php echo $_GET['tgl_alas_hak'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama Pihak I (Pertama)
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Pembuat Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="pembuat_alas_hak" value="<?php echo $_GET['pembuat_alas_hak'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<?php 
											$sql = "SELECT * FROM saksi LEFT JOIN jenis_kelamin ON saksi.id_jk = jenis_kelamin.id_jk";
											$query = mysqli_query($koneksi, $sql);
										 ?>
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Luas Yang Dimohon</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="luas_yang_dimohon" value="<?php echo $_GET['luas_yang_dimohon'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Batas Tanah :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_persetujuan_keluarga.php" class="btn btn-secondary">Persetujuan Keluarga</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Utara</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="utara" value="<?php echo $_GET['bt_utara'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama Keluarga
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Timur</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="timur" value="<?php echo $_GET['bt_timur'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Selatan</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="selatan" value="<?php echo $_GET['bt_selatan'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											2.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="text-center">Barat</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="barat" value="<?php echo $_GET['bt_barat'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											3.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>

										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											4.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Harga</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="number" name="harga" value="<?php echo $_GET['harga_bah'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											5.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_kuasa.php" class="btn btn-secondary">Penerima Kuasa</a>
										</td>
									</div>			
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
											<input type="emai" readonly disabled>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											6.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Nama
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Almarhum</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nama_almarhum" value="<?php echo $_GET['nama_alm'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Meninggal :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_ahli_waris.php" class="btn btn-secondary">Ahli Waris</a>
										</td>
									</div>	
									<div class="col-md-1">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href=""></a>
										</td>
									</div>
									<div class="col-md-3">
										<td>
											<a href="entri_penyanggah.php" class="btn btn-secondary">Penyanggah</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tgl_meninggal" value="<?php echo $_GET['tgl_alm'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											Nama Ahli Waris
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											Umur
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>
									<div class="col-md-3">
										<td>

										</td>
									</div>	
									<div class="col-md-1">
										<td>
											No.
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											Nama Penyanggah
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											NIK
										</td>
									</div>
									<div class="col-md-2">
										<td>
											Lihat
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Desa</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="desa_meninggal" value="<?php echo $_GET['desa_alm'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-1">
										<td>
											1.
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kecamatan</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kecamatan_meninggal" value="<?php echo $_GET['kecamatan_alm'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											2.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kabupaten</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kabupaten_meninggal" value="<?php echo $_GET['kabupaten_alm'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											3.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tinggal Terakhir di :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											4.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Desa</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="desa_akhir" value="<?php echo $_GET['desa_akhir'] ?>">
										</td>
									</div>	
									<div class="col-md-3">
										<td>
											
										</td>
									</div>
									<div class="col-md-1">
										<td>
											5.
										</td>
									</div>
									<div class="col-md-3">
										<td>
											
										</td>
									</div>	
									<div class="col-md-2">
										<td>
											
										</td>
									</div>
									<div class="col-md-2">
										<td>
											<a href="">Lihat</a>
										</td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kecamatan</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kecamatan_akhir" value="<?php echo $_GET['kecamatan_akhir'] ?>">
										</td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kabupaten</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kabupaten_akhir" value="<?php echo $_GET['kabupaten_akhir'] ?>">
										</td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Perkawinan Dengan</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="kawin_dengan" value="<?php echo $_GET['kawin_dengan'] ?>">
										</td>
									</div>
								</tr>
						<tr>
							<td></td>
							<td>
								<label class="ml-2">
									<input type="submit" name="btn_ubah" value="Simpan Perubahan"/>
								</label>
							</td>
						</tr>

					</table>
					<br>
				</div>

				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
			</fieldset>
		</form>

		<?php
// 		echo "<pre>";
// 		print_r($level);
//		echo "</pre>";
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['id']) && isset($_GET['aksi'])){
		$id = $_GET['id'];
		$sql_hapus = "DELETE FROM bukti_alas_hak WHERE id_bah=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				echo "<meta http-equiv='refresh' content='1;url=entri_bukti_alas_hak.php'>";
			}
		}
	}
	
}
// --- Tutup Fungsi Hapus


// ===================================================================

// --- Program Utama
if (isset($_GET['aksi'])){
	switch($_GET['aksi']){
		case "create":
			echo '<a href="entri_saksi.php"> &laquo; Home</a>';
			tambah($koneksi);
			break;
		case "read":
			tampil_data($koneksi);
			break;
		case "update":
			ubah($koneksi);
			tampil_data($koneksi);
			break;
		case "delete":
			hapus($koneksi);
			break;
		default:
			echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidaka ada!</h3>";
			tambah($koneksi);
			tampil_data($koneksi);
	}
} else {
	tambah($koneksi);
	tampil_data($koneksi);
}

?>
                    		</div>
                    	</div>
                    </div>
				</div>
			</div>
		</main>


<?php include_once('../../../_footer.php'); ?>
<script type="text/javascript" charset="utf8">
            $(document).ready( function () {
                $('#user').DataTable(
                    {
                        "pageLength": 4,
                        responsive: true,
                        select: true
                    }
                    );
            } );

			function EnableDisable(txtPassportNumber) {
            //Reference the Button.
            var btnSubmit = document.getElementById("btnSubmit");

            //Verify the TextBox value.
            if (txtPassportNumber.value.trim() == "1") {
                //Enable the TextBox when TextBox has value.
                btnSubmit.disabled = false;
            } else {
                //Disable the TextBox when TextBox is empty.
                btnSubmit.disabled = true;
            }
        };

        </script>
