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
		$nik = $_POST['nik'];
		$id_jk = $_POST['id_jk'];
		$nm_saksi = $_POST['nm_saksi'];
		$alamat = $_POST['alamat'];
		$temp_lahir = $_POST['temp_lahir'];
		$desa = $_POST['desa'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$kecamatan = $_POST['kecamatan'];
		$pekerjaan = $_POST['pekerjaan'];
		$kabupaten = $_POST['kabupaten'];
		$agama = $_POST['agama'];

		
		if(!empty($nik) && !empty($id_jk) && !empty($nm_saksi) && !empty($alamat) && !empty($temp_lahir)){

			$sql ="INSERT INTO saksi
            (nik_saksi,id_jk,nama_saksi,alamat_saksi,temp_lahir_saksi,desa_saksi,tgl_lahir_saksi,kecamatan_saksi,pekerjaan_saksi,kabupaten_saksi,agama_saksi)
            VALUES('$nik','$id_jk','$nm_saksi','$alamat','$temp_lahir','$desa','$tgl_lahir','$kecamatan','$pekerjaan','$kabupaten','$agama')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					echo "<meta http-equiv='refresh' content='1;url=entri_saksi.php'>";
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
											<select name="id_jah" required>
									        	<?php 
													$datajenis_alas_hak = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_alas_hak");
													while ($jenis_alas_hak = mysqli_fetch_assoc($sql)) {
													    $datajenis_alas_hak[] = $jenis_alas_hak;
													}
												?>
									            <option disabled selected value="">-Pilih Jenis Alas Hak-</option>
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
											<input type="text" name="kecamatan_meninggal">
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
	$sql = "SELECT * FROM saksi LEFT JOIN jenis_kelamin ON saksi.id_jk = jenis_kelamin.id_jk";
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
				<td><?php echo $data['nama_saksi']; ?></td>
				<td><?php echo $data['nik_saksi']; ?></td>
				<td><?php echo $data['desa_saksi']; ?></td>
				<td><?php echo $data['kecamatan_saksi']; ?></td>
				<td><?php echo $data['kabupaten_saksi']; ?></td>
				<td><?php echo $data['kecamatan_saksi']; ?></td>
				<td><?php echo $data['kabupaten_saksi']; ?></td>
				<td>
					<a href="entri_saksi.php?aksi=update&id=<?php echo $data['id_saksi']; ?>&nik=<?php echo $data['nik_saksi']; ?>&jk=<?php echo $data['id_jk']; ?>&nm_saksi=<?php echo $data['nama_saksi']; ?>&alamat=<?php echo $data['alamat_saksi']; ?>&temp_lahir=<?php echo $data['temp_lahir_saksi']; ?>&desa=<?php echo $data['desa_saksi']; ?>&tgl_lahir=<?php echo $data['tgl_lahir_saksi']; ?>&kecamatan=<?php echo $data['kecamatan_saksi']; ?>&pekerjaan=<?php echo $data['pekerjaan_saksi']; ?>&kabupaten=<?php echo $data['kabupaten_saksi']; ?>&agama=<?php echo $data['agama_saksi']; ?>">Edit</a>
				</td>
				<td>
					<a href="entri_saksi.php?aksi=delete&id=<?php echo $data['id_saksi']; ?>" onClick="return confirm('Yakin akan menghapus saksi <?= $data['nama_saksi']; ?>?')">Hapus</a>
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
		$id_saksi = $_POST['id_saksi'];
		$nik = $_POST['nik'];
		$id_jk = $_POST['id_jk'];
		$nm_saksi = $_POST['nm_saksi'];
		$alamat = $_POST['alamat'];
		$temp_lahir = $_POST['temp_lahir'];
		$desa = $_POST['desa'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$kecamatan = $_POST['kecamatan'];
		$pekerjaan = $_POST['pekerjaan'];
		$kabupaten = $_POST['kabupaten'];
		$agama = $_POST['agama'];

		
		if(!empty($nik) && !empty($id_jk) && !empty($nm_saksi) && !empty($alamat) && !empty($temp_lahir)){
			$sql_update = "UPDATE saksi SET nik_saksi='$nik', id_jk='$id_jk',
	            nama_saksi='$nm_saksi',
	            alamat_saksi='$alamat', temp_lahir_saksi='$temp_lahir', desa_saksi='$desa',
	            tgl_lahir_saksi='$tgl_lahir', kecamatan_saksi='$kecamatan', pekerjaan_saksi='$pekerjaan', kabupaten_saksi='$kabupaten', agama_saksi='$agama' WHERE id_saksi=$id_saksi";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
					echo "<meta http-equiv='refresh' content='1;url=entri_saksi.php'>";
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){

		?>
			<a href="entri_saksi.php"> &laquo; Home</a> | 
			<a href="entri_saksi.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			<h3>Ubah Data</h3>
			<form action="" method="POST">
			<fieldset>
				<div class="table-responsive">
					<table class="table table-responsive-sm table-hover" border="0">
						<tr>
							<td>	
								<input type="hidden" name="id_saksi" value="<?php echo $_GET['id'] ?>"/>
							</td>
						</tr>
						<tr>
							<div class="col-md-3">
								<td>NIK </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="number" name="nik" value="<?php echo $_GET['nik'] ?>" required /></td>
							</div>		
							<div class="col-md-3">
								<td>Jenis Kelamin </td>
							</div>
							<div class="col-md-3">
								<td> : 
									<select name="id_jk" required>
						        	<?php 
							        	$datajenis_kelamin = array();
										$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
										while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
										    $datajenis_kelamin[] = $jenis_kelamin;
										}
											$sql = "SELECT * FROM saksi WHERE id_saksi='$_GET[id]'";
											$result = mysqli_query($koneksi, $sql);

											$jenis_kelamin = mysqli_fetch_assoc($result);
							        	 ?>
							            <option disabled value="">-Pilih Jenis Kelamin-</option>
							            <?php foreach ($datajenis_kelamin as $key => $value):?>
							            <option value="<?= $value["id_jk"] ?>" <?php if($jenis_kelamin["id_jk"]==$value["id_jk"]){ echo "selected"; } ?> >
							            <?= $value["nama_jk"] ?>
							            </option>
							        	<?php endforeach ?>
									</select>
								</td>
							</div>		
						</tr>
						<tr>
							<div class="col-md-3">
								<td>Nama Saksi </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="text" name="nm_saksi" value="<?php echo $_GET['nm_saksi'] ?>" required /></td>
							</div>		
							<div class="col-md-3">
								<td>Alamat </td>
							</div>
							<div class="col-md-3">
								<td> : <textarea name="alamat" row="4" cols="23"><?php echo $_GET['alamat'] ?></textarea></td>
							</div>		
						</tr>
						<tr>
							<div class="col-md-3">
								<td>Tempat Lahir </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="text" name="temp_lahir" value="<?php echo $_GET['temp_lahir'] ?>" required /></td>
							</div>		
							<div class="col-md-3">
								<td>Desa </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="text" name="desa" value="<?php echo $_GET['desa'] ?>" required /></td>
							</div>
						</tr>
						<tr>
							<div class="col-md-3">
								<td>Tanggal Lahir </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="date" name="tgl_lahir" value="<?php echo $_GET['tgl_lahir'] ?>" required /></td>
							</div>		
							<div class="col-md-3">
								<td>Kecamatan </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="text" name="kecamatan" value="<?php echo $_GET['kecamatan'] ?>" required /></td>
							</div>
						</tr>
						<tr>
							<div class="col-md-3">
								<td>Pekerjaan </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="rext" name="pekerjaan" value="<?php echo $_GET['pekerjaan'] ?>" required /></td>
							</div>		
							<div class="col-md-3">
								<td>Kabupaten </td>
							</div>
							<div class="col-md-3">
								<td> : <input type="text" name="kabupaten" value="<?php echo $_GET['kabupaten'] ?>" required /></td>
							</div>
						</tr>
						<tr>
							<td>Agama </td> 
							<td> : <input type="text" name="agama" value="<?php echo $_GET['agama'] ?>" required/></td>
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
		$sql_hapus = "DELETE FROM saksi WHERE id_saksi=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				echo "<meta http-equiv='refresh' content='1;url=index.php'>";
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
        </script>
