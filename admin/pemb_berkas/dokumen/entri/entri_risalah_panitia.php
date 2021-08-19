<?php $title = "Entri Risalah Panitia";
include_once('../../../_header.php');

?>

			<div id="layoutSidenav_content">
                <main>
                    <?php 
                    if (!isset($_SESSION['admin']) AND !isset($_SESSION['p_yuridis'])) {
                        echo    "<script>
                                alert('Anda Bukan Admin');
                                location='../../../pemb_berkas';
                            </script>";
                        } 
                     ?>
                    <div class="container-fluid">
                        <p>Entri Data Risalah Panitia Nomor Berkas :</p>
                        




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
	<div class="row" style="margin-top: -400px;">

		<div class="col-xl-12">

		<form action="" method="POST">
			<div class="form-row">
<!-- 					<fieldset> -->
						<div class="table-responsive">
							<table class="table table-responsive-sm table-hover">
								<tr>
									<td colspan="4">
										<ol class="breadcrumb">
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas');?>"> Berkas</a>
				                            </li>
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen');?>"> Dokumen</a>
				                            </li>
				                            <li class="breadcrumb-item active">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen/entri/entri_pemohon.php');?>"> Entri</a>
				                            </li>
				                            <li class="breadcrumb-item active float-right">
				                                <a href="<?= base_url('admin/pemb_berkas/dokumen/entri/entri_pemohon.php');?>"> Cetak Risalah Panitia</a>
				                            </li>
				                        </ol>
									</td>
								</tr>
								<tr>
									<td colspan='4'>
										<h3 class="text-center">RISALAH PENELITIAN DATA YURIDIS</h3>
									</td>
								</tr>
									<tr>	
										<td colspan='1'></td>
										<td>Desa/Kelurahan </td>
										<td> : <input type="text" name="desa_kel" required /></td>
										<td colspan='1'></td>
									</tr>
									<tr>
										<td colspan='1'></td>
										<td>NIB</td> 
										<td> : <input type="text" name="nib" required /></label></td>
										<td colspan='1'></td>
									</tr>
									<tr>
										<td colspan='1'></td>
										<td>No. Berkas Yuridis </td> 
										<td> : <input type="text" name="no_yuri" required/></td>
										<td colspan='1'></td>
									</tr>
									<tr>
										<td colspan='1'></td>
										<td>Petugas Yuridis</td> 
										<td> : 
												<select name="id_petugas" required>
										        	<?php 
														$datajenis_kelamin = array();
														$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
														while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
														    $datajenis_kelamin[] = $jenis_kelamin;
														}
													?>
										            <option disabled selected value="">-Pilih Petugas Yuridis-</option>
										            <?php foreach ($datajenis_kelamin as $key => $value):?>
										            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
										            <?php endforeach ?>
												</select>
											</td>
											<td colspan='1'></td>
									</tr>
								<tr>
									<td colspan='4'>
										<p class="text-center font-weight-bold">IDENTIFIKASI BIDANG TANAH YANG BERKEPENTNGAN</p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Pemohon </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="number" name="nik" required /></td>
									</div>		
									<div class="col-md-3">
										<td>Jenis Pemohon </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="jenis_pemohon" required />
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Pekerjaan </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="pekerjaan" required /></td>
									</div>		
									<div class="col-md-3">
										<td> </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Alamat Pemohon :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
									<div class="col-md-3">
										<td>Badan Hukum </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_bh" required>
										        	<?php 
														$datajenis_kelamin = array();
														$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
														while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
														    $datajenis_kelamin[] = $jenis_kelamin;
														}
													?>
										            <option disabled selected value="">-Pilih Badan Hukum-</option>
										            <?php foreach ($datajenis_kelamin as $key => $value):?>
										            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
										            <?php endforeach ?>
												</select>
										</td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Desa </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="desa2" required /></td>
									</div>		
									<div class="col-md-3">
										<td>Akta Pendirian : </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kecamatan </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="rext" name="kecamatan" required /></td>
									</div>		
									<div class="col-md-3">
										<td>No. Akta Pendirian </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="kabupaten" required /></td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kabupaten </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="rext" name="kabupaten" required /></td>
									</div>		
									<div class="col-md-3">
										<td>Tgl. Akta Pendirian </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_akta_pendirian" required /></td>
									</div>
								</tr>
								<tr>
									<td colspan='4'>
										<p class="text-center font-weight-bold">DATA TENTANG KEPEMILIKAN DAN PENGUASAAN HAK ATAS TANAH</p>
									</td>
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Bukti-Bukti kepemilikan/Penguasaan :</p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Sertipikat : </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
									<div class="col-md-3">
										<td>Pelelangan :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nomor Sertipikat </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_sertipikat" required /></td>
									</div>	
									<div class="col-md-3">
										<td>No. Risalah Lelang </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_rlelang" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal Sertipikat </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_sertipikat" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Tgl. Risalah Lelang </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_rlelang" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
									<div class="col-md-3">
										<td>Tempat dan Nama Kantor Lelang </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="tempat_kantor_lelang" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Warisan : </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Pewaris </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_pewaris" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Putusan Pemberian Hak :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Meninggal Tahun </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="tahun_meninggal" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Jabatan Yang Memutuskan</td>
									</div>
									<div class="col-md-3">
										<td>: <input type="text" name="jabatan_yg_memutuskan" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Surat Keterangan :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
									<div class="col-md-3">
										<td>No. Surat Keputusan</td>
									</div>
									<div class="col-md-3">
										<td>: <input type="text" name="no_surat_keputusan" required /></td>
									</div>		
								</tr>
								<tr>	
									<div class="col-md-3">
										<td>Waris </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_waris" required>
										        	<?php 
														$datajenis_kelamin = array();
														$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
														while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
														    $datajenis_kelamin[] = $jenis_kelamin;
														}
													?>
										            <option disabled selected value="">-Pilih Waris-</option>
										            <?php foreach ($datajenis_kelamin as $key => $value):?>
										            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
										            <?php endforeach ?>
												</select>
										</td>
									</div>
									<div class="col-md-3">
										<td>Tgl. Surat Keputusan</td>
									</div>
									<div class="col-md-3">
										<td>: <input type="date" name="tgl_surat_keputusan" required /></td>
									</div>
								</tr>
								<tr>	
									<div class="col-md-3">
										<td>Wasiat </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_wasiat" required>
										        	<?php 
														$datajenis_kelamin = array();
														$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
														while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
														    $datajenis_kelamin[] = $jenis_kelamin;
														}
													?>
										            <option disabled selected value="">-Pilih Wasiat-</option>
										            <?php foreach ($datajenis_kelamin as $key => $value):?>
										            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
										            <?php endforeach ?>
												</select>
										</td>
									</div>
									<div class="col-md-3">
										<td>Persyaratan</td>
									</div>
									<div class="col-md-3">
										<td>: 
											<select name="id_persyaratan" required>
										        	<?php 
														$datajenis_kelamin = array();
														$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
														while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
														    $datajenis_kelamin[] = $jenis_kelamin;
														}
													?>
										            <option disabled selected value="">-Pilih Persyaratan-</option>
										            <?php foreach ($datajenis_kelamin as $key => $value):?>
										            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
										            <?php endforeach ?>
											</select>
										</td>
									</div>
								</tr>
								<tr>	
									<div class="col-md-3">
										<td>Surat Keterangan Meninggal </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_stm" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih Suket-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Hibah/Pemberian : </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
									<div class="col-md-3">
										<td>Perwakafan :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Dilakukan Dengan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_dk" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>No. Akta Pengganti Ikrar Wakaf  </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_akta_pengganti" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>No. Alash Hak </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_alas_hak" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Tgl. Akta Pengganti Ikrar Wakaf  </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_akta_pengganti" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tgl. Alash Hak </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_alas_hak" required /></td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Pembuat Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_pembuat_ahak" required /></td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
									<div class="col-md-3">
										<td>Lain - Lain :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
									<div class="col-md-3">
										<td>No. Alash Hak</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_alas_hak2" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Hibah/Pemberian :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
									<div class="col-md-3">
										<td>Tgl. Alash Hak</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="tgl_alas_hak2" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Dilakukan Dengan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_dk" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>	
									<div class="col-md-3">
										<td>Nama Pembuat Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_pembuat_ahak2" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>No. Alash Hak </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_alas_hak3" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Nama Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_alas_hak" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tgl. Alash Hak </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_alas_hak3" required /></td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Pembuat Alas Hak</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_pembuat_ahak3" required /></td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Bukti Perpajakan</p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Petok D/Letter C, Girik, ketikir :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nomor</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_bp" required /></td>
									</div>	
									<div class="col-md-3">
										<td>IPEDA / PBB / SPPT :</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_bp" required /></td>
									</div>	
									<div class="col-md-3">
										<td>NOP PBB</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nop_pbb" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kantor yang menerbitkan</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="kantor_ym" required /></td>
									</div>		
									<div class="col-md-3">
										<td>Tgl. PBB</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_pbb"></td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Verponding Indonesia : </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
									<div class="col-md-3">
										<td>Lain – lain sebutkan </td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nomor</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="no_vi" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Nama :</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_ll"></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="date" name="tgl_vi" required /></td>
									</div>	
									<div class="col-md-3">
										<td>Nomor</td>
									</div>
									<div class="col-md-3">
										<td>: <input type="text" name="no_ll" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kantor yang menerbitkan :</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="kantor_vi"></td>
									</div>	
									<div class="col-md-3">
										<td>Tanggal</td>
									</div>
									<div class="col-md-3">
										<td>: <input type="date" name="tgl_ll" required /></td>
									</div>		
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Kenyataan Penguasaan dan Penggunaan Tanah </p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Pada Tahun :</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="tahun_kp"></td>
									</div>		
									<div class="col-md-3">
										<td>dikuasai/dimiliki oleh </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="pihak1"></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Berikutnya Pada Tahun</td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="tahun_brkt" required /></td>
									</div>	
									<div class="col-md-3">
										<td>dikuasai/dimiliki oleh </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="nm_pemohon"></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Berdasarkan </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="j_ahak" required /></td>
									</div>	
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Penggunaan Tanah</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_pt" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Bangunan di Atas Tanah </p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Bangunan di Atas Tanah </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_bdat" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>		
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Lain - Lain </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="lain_lain" required /></td>
									</div>	
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Status Tanahnya </p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanah Dengan Hak Perorangan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_tdhp" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td>Tanah Negara </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_tn" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Lain - Lain </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="lain_lain" required /></td>
									</div>
									<div class="col-md-3">
										<td>Lain - Lain </td>
									</div>
									<div class="col-md-3">
										<td> : <input type="text" name="lain_lain" required /></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanah bagi Kepentingan Umum </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_tbku" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanah Kepentingan Umum </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="tanah_ku">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="font-weight-bold">Beban-beban Atas Tanah </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="beban_at">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-6">
										<td colspan='2' class="font-weight-bold">Bangunan Kepentingan Umum dan Sosial </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name=bangunan_kus">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>	
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Perkara/Sengketa Atas Tanah </p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Sedang dalam Perkara </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="sdp">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Sedang dalam Sengketa </td>
									</div>
									<div class="col-md-3">
										<td rowspan="2"> : 
											<input type="text" name="sds"> <br> &nbsp;&nbsp;&nbsp;kalau ada uraikan
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr></tr>
								<tr>
									<div class="col-md-3">
										<td rowspan="2">YANG MENGUMPULKAN DATA <br> (SATGAS YURIDIS)
									<div class="col-md-3">
										<td> : 
											<input type="text" name="ymd">
										</td>
									</div>
									<div class="col-md-3">
										<td rowspan="2">YANG BERKEPENTINGAN/ <br> KUASANYA
									<div class="col-md-3">
										<td> : 
											<input type="text" name="ymd">
										</td>
									</div>		
								</tr>
								<tr></tr>
								<tr>
									<div class="col-md-3">
										<td>NIP </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nip">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold text-center">KESIMPULAN PANITIA AJUDIKASI PENDAFTARAN TANAH SISTEMATIS LENGKAP KANTOR </p>
									</td>
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Berdasarkan pada penilaian atas fakta dan data yang telah dikumpulkan, maka dengan ini disimpulkan bahwa : </p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2" class="font-weight-bold">Pemiliknya/yang menguasai tanah adalah</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama_pemohon">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<td colspan='4'>
										<p class="font-weight-bold">Status tanahnya adalah </p>
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanah Hak </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="tanah_hak">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Bekas tanah adat perorangan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_btap" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanah Negara </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_tn" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Lain-lain </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="ll"> sebutkan
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Kepada yang memiliki/menguasai, yaitu </td>
									</div>
									<div class="col-md-3">
										<td > : 
											<input type="text" name="nama_pemohon2">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">dapat/tidak dapat </td>
									</div>
									<div class="col-md-3">
										<td > : 
											<input type="text" name="dapat">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">diusulkan untuk diberikan Hak </td>
									</div>
									<div class="col-md-3">
										<td > : 
											<input type="text" name="jh">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="font-weight-bold">Pembebanan atas tanah </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_pat" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="font-weight-bold">Alat bukti yang diajukan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="abyd">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<td class="font-weight-bold" colspan="4">
										Demikian kesimpulan risalah penelitian data yuridis bidang tanah dengan
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>NIB </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nib_dk">
										</td>
									</div>
									<div class="col-md-3">
										<td>Dibuat di</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="dibut">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Oleh </td>
									</div>
									<div class="col-md-3">
										<td> : 
											
										</td>
									</div>
									<div class="col-md-3">
										<td>Tanggal</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="dibut" required>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>KETUA PANITIA AJUDIKASI </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="kpa">
										</td>
									</div>
									<div class="col-md-3">
										<td>WAKIL KETUA BIDANG YURIDIS</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="wkby">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>NIP </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nip_kpa">
										</td>
									</div>
									<div class="col-md-3">
										<td>NIP</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nip_wkby">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>WAKIL KETUA BIDANG FISIK </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="wkbf">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>NIP </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nip_wkbf">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<td colspan="4">
										Anggota Panitia Ajudikasi PTSL
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama1">
										</td>
									</div>
									<div class="col-md-3">
										<td>Nama</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nama2">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>NIP </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nip1">
										</td>
									</div>
									<div class="col-md-3">
										<td>NIP</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nip2">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama3">
										</td>
									</div>
									<div class="col-md-3">
										<td>Nama</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nama4">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>NIP </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nip3">
										</td>
									</div>
									<div class="col-md-3">
										<td>NIP</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nip4">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama5">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>NIP </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nip5">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<td colspan="4" class="font-weight-bold text-center">
										SANGGAHAN/KEBERATAN
									</td>
								</tr>
								<tr>
									<td colspan="4" class="font-weight-bold">
										Uraian singkat perkara/sengketa/sanggahan
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nama Penyanggah </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama_penyanggah">
										</td>
									</div>
									<div class="col-md-3">
										<td>Beserta surat buktinya :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Desa </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="desa_sanggah">
										</td>
									</div>
									<div class="col-md-3">
										<td>Nama Surat</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="nama_surat">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kecamatan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="kecamatan_sanggah">
										</td>
									</div>
									<div class="col-md-3">
										<td>No. Surat</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="no_surat">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Kabupaten </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="kabupaten_sanggah">
										</td>
									</div>
									<div class="col-md-3">
										<td>Tgl. Surat</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tgl_surat">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Gugatan ke Pengadilan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_gkp" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Selama penumuman </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_sp" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Alasan Penyanggah </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="ap">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<td colspan="4">
										diisi bila ada yang menyanggah
									</td>
								</tr>
								<tr>
									<td colspan="2" class="font-weight-bold">
										Penyelesaian perkara/sengketa/sanggahan
									</td>
									<td>
										 : 
										<input type="text" name="ppss">
									</td>
								</tr>
								<tr>
									<td colspan="4" class="text-center font-weight-bold">
										KESIMPULAN AKHIR KETUA PANITIA AJUDIKASI PENDAFTARAN TANAH SISTEMATIS LENGKAP
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="font-weight-bold" colspan="2">Nama Pemilik/yang berkepentingan </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="text" name="nama_pemilik">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td class="font-weight-bold" colspan="2">Status Tanah</td>
									</div>
									<div class="col-md-3">
										<td> : 
											<select name="id_st" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<td colspan="4">
										Pertimbangan dalam hal status
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Berita Acara Pengesahan Pengumuman data fisik</td>
									</div>
									<div class="col-md-3">
										<td colspan="2">Tanah dalam proses perkara/sengketa</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Nomor </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="number" name="nomorp">
										</td>
									</div>
									<div class="col-md-3">
										<td>Perkara</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="perkara">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal </td>
									</div>
									<div class="col-md-3">
										<td> : 
											<input type="date" name="tanggalp">
										</td>
									</div>
									<div class="col-md-3">
										<td>Nomor</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="number" name="nomorp2">
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
										<td>Tanggal</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tanggalp2">
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>pemberian hak</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="phak">
										</td>
									</div>
									<div class="col-md-3">
										<td>* Jika ada</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<td colspan="4" class="text-center font-weight-bold">
										KEPUTUSAN KETUA PANITIA AJUDIKASI PENDAFTARAN TANAH SISTEMATIS LENGKAP KANTOR PERTANAHAN KABUPATEN BENER MERIAH, PROPINSI ACEH
									</td>
								</tr>
								<tr>
									<td colspan="4">
										Surat Keputusan Kepala  Kantor  Pertanahan Kabupaten BENER MERIAH
									</td>
								</tr>
								<tr>
									<div class="col-md-3">
										<td>No. SK Penlok</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="text" name="no_skp">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td>Tanggal SK Penlok</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tgl_skp">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Biaya Perolehan Tanah dan Bangunan (BPHTB) :</td>
									</div>
									<div class="col-md-3">
										<td> :
											<select name="id_bphtb" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Jika Terhutang sesuai dengan Surat Pernyataan :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Nomor</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="number" name="no_bphtb">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Tanggal</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tgl_bphtb">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Pajak Penghasilan (PPh) :</td>
									</div>
									<div class="col-md-3">
										<td> :
											<select name="id_pph" required>
									        	<?php 
													$datajenis_kelamin = array();
													$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
													while ($jenis_kelamin = mysqli_fetch_assoc($sql)) {
													    $datajenis_kelamin[] = $jenis_kelamin;
													}
												?>
									            <option disabled selected value="">-Pilih-</option>
									            <?php foreach ($datajenis_kelamin as $key => $value):?>
									            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
									            <?php endforeach ?>
											</select>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Jika Terhutang sesuai dengan Surat Pernyataan :</td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Nomor</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="number" name="no_pph">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
										</td>
									</div>		
								</tr>
								<tr>
									<div class="col-md-3">
										<td colspan="2">Tanggal</td>
									</div>
									<div class="col-md-3">
										<td> :
											<input type="date" name="tgl_pph">
										</td>
									</div>
									<div class="col-md-3">
										<td></td>
									</div>
									<div class="col-md-3">
										<td>
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
<!-- 				</fieldset> -->
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
				<th>No. Berkas</th>
				<th>No. Berkas Yuridis</th>
				<th>NUB</th>
				<th>Nama Pemohon</th>
				<th>Jenis Pemohon</th>
				<th>Jenis Hak</th>
				<th>Jenis Alas Hak</th>
				<th>Luas Yang Dimohon</th>
				<th>Luas Pengukuran</th>
				<th>NIB</th>
				<th>Petugas Yuridis</th>
				<th>Edit</th>";	
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
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_saksi']; ?></td>
				<td><?php echo $data['nik_saksi']; ?></td>
				<td><?php echo $data['desa_saksi']; ?></td>
				<td><?php echo $data['kecamatan_saksi']; ?></td>
				<td><?php echo $data['kabupaten_saksi']; ?></td>
				<td>
					<a href="entri_saksi.php?aksi=update&id=<?php echo $data['id_saksi']; ?>&nik=<?php echo $data['nik_saksi']; ?>&jk=<?php echo $data['id_jk']; ?>&nm_saksi=<?php echo $data['nama_saksi']; ?>&alamat=<?php echo $data['alamat_saksi']; ?>&temp_lahir=<?php echo $data['temp_lahir_saksi']; ?>&desa=<?php echo $data['desa_saksi']; ?>&tgl_lahir=<?php echo $data['tgl_lahir_saksi']; ?>&kecamatan=<?php echo $data['kecamatan_saksi']; ?>&pekerjaan=<?php echo $data['pekerjaan_saksi']; ?>&kabupaten=<?php echo $data['kabupaten_saksi']; ?>&agama=<?php echo $data['agama_saksi']; ?>">Edit</a>
				</td>
<!-- 				<td>
					<a href="entri_saksi.php?aksi=delete&id=<?php echo $data['id_saksi']; ?>" onClick="return confirm('Yakin akan menghapus saksi <?= $data['nama_saksi']; ?>?')">Hapus</a>
				</td> -->
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
