<?php $title = "Entri Data Pengukuran";
include_once('../../../_header.php');

?>

			<div id="layoutSidenav_content">
            <main>
                    <?php 
                    if (!isset($_SESSION['p_ukur']) AND !isset($_SESSION['admin'])) {
                        echo    "<script>
                                alert('Anda Bukan Admin');
                                location='../../../pemb_berkas';
                            </script>";
                        } 
                     ?>
                    <div class="container-fluid">
                        <p>Entri Data Saksi Nomor Berkas :</p>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                <a href="<?= base_url('admin/pemb_berkas');?>"> Berkas</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="<?= base_url('admin/pemb_berkas/dokumen');?>"> Dokumen</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="<?= base_url('admin/pemb_berkas/dokumen/entri/entri_pemohon.php');?>"> Entri</a>
                            </li>
                    </ol>
                    


<?php

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$nik_pemohon = $_POST['nik_pemohon'];
		$id_klaster = $_POST['id_klaster'];
		$id_user = $_POST['id_user'];
        $nub = $_POST['nub'];
		$luas_pengukuran = $_POST['luas_pengukuran'];
		$penggunaan_tanah = $_POST['penggunaan_tanah'];
		$tanda_batas = $_POST['tanda_batas'];
		$no_pbt = $_POST['no_pbt'];
		$no_gu = $_POST['no_gu'];
		$no_berkas_fisik = $_POST['no_berkas_fisik'];
		$nib = $_POST['nib'];

		
		if(!empty($nub) && !empty($luas_pengukuran) && !empty($penggunaan_tanah) && !empty($tanda_batas)){

			$sql ="INSERT INTO pengukuran
            (nik_pemohon,id_klaster,id_user,nub,luas_pengukuran,penggunaan_tanah,tanda_batas,no_pbt,no_gu,no_berkas_fisik,nib)
            VALUES('$nik_pemohon','$id_klaster','$id_user','$nub','$luas_pengukuran','$penggunaan_tanah','$tanda_batas',
            '$no_pbt','$no_gu','$no_berkas_fisik','$nib')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: entri_persil.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data belum lengkap!";
		}
	}

	?> 
		<dir class="row">
		<div class="col-xl-15">
		<form action="" method="POST">
			<div class="form-row">
					<fieldset>
						<div class="table-responsive">
							<table class="table table-responsive-sm table-hover" border="0">
                    <tr>
							<td>Nama Pemohon </td>
							<?php 
						        	$datapemohon = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM pemohon");
									while ($pemohon = mysqli_fetch_assoc($sql)) {
									    $datapemohon[] = $pemohon;
									}
										
						        	 ?>
									 <?php foreach ($datapemohon as $key => $value)?>
							<td> : <input type="text" name="nik_pemohon" value="<?= $value["nik_pemohon"] ?>" hidden><?= $value["nama_pemohon"] ?> </td>
						</tr>
						<tr>
							<td>Klaster </td>
							<?php 
						        	$dataklaster = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM klaster");
									while ($klaster = mysqli_fetch_assoc($sql)) {
									    $dataklaster[] = $klaster;
									}
										
						        	 ?>
									 <?php foreach ($dataklaster as $key => $value)?>
							<td> : <input type="text" name="id_klaster" value=" <?= $value['id_klaster']?>" hidden><?= $value["nama_klaster"] ?></td>
						</tr>
						<tr>
							<td>NUB </td> 
							<td> : <input type="text" name="nub"  required/></td>
						</tr>
						<tr>
							<td>Luas Pengukuran </td>
							<td> : <input type="text" name="luas_pengukuran"  required /> </td>
						</tr>
						<tr>
							<td>Penggunaan Tanah </td> 
							<td> : <input type="text" name="penggunaan_tanah"  required /></td>
						</tr>
						<tr>
							<td>Tanda Batas </td> 
							<td> : <input type="text" name="tanda_batas"  required/></td>
						</tr>
						<tr>
							<td>No. PBT </td>
							<td> : <input type="text" name="no_pbt"  required /></td>
						</tr>
						<tr>
							<td>No. GU </td> 
							<td> : <input type="text" name="no_gu"  required /></td>
						</tr>
						<tr>
							<td>No.Berkas Fisik </td> 
							<td> : <input type="text" name="no_berkas_fisik"  required/></td>
						</tr>
						<tr>
							<td>NIB </td>
							<td> : <input type="text" name="nib"  required /></td>
						</tr>
						<tr>
							<td>Nama Petugas Pengukuran</td> 
							<td> : 
						        <select name="id_user" required>
						        	<?php 
						        	$datauser = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM user");
									while ($user = mysqli_fetch_assoc($sql)) {
									    $datauser[] = $user;
									}
										
						        	 ?>
						            <option disabled value selected="">-Pilih Desa-</option>
						            <?php foreach ($datauser as $key => $value):?>
						            <option value="<?= $value["id_user"] ?>"><?= $value["nama_user"] ?>
						            </option>
						        	<?php endforeach ?>
								</select>
					        </td>
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
                </div>
                

				<p><?php echo isset($pesan) ? $pesan : "" ?></p>
			</fieldset>
		</form>

	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM pengukuran LEFT JOIN klaster ON pengukuran.id_klaster = klaster.id_klaster 
	LEFT JOIN user ON pengukuran.id_user = user.id_user 
	LEFT JOIN pemohon ON pengukuran.nik_pemohon = pemohon.nik_pemohon";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr>";
			echo "<th>No</th>
				<th>Klaster</th>
				<th>NUB</th>
				<th>Nama Pemohon</th>
				<th>NIK</th>
				<th>Alamat Pemohon</th>
				<th>No. Berkas Fisik</th>
				<th>PBT</th>
				<th>NIB</th>
				<th>NO. GU</th>
				<th>Luas Pengukuran</th>
				<th>Tanda Batas</th>
				<th>Nama Petugas</th>
				<th>Edit</th>
				<th>Hapus</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_klaster']; ?></td>
				<td><?php echo $data['nub']; ?></td>
				<td><?php echo $data['nama_pemohon']; ?></td>
				<td><?php echo $data['nik_pemohon']; ?></td>
				<td>Desa <?php echo $data['desa_pemohon'];?>, Kecamatan <?= $data['kecamatan_pemohon']; ?></td>
				<td><?php echo $data['no_berkas_fisik']; ?></td>
				<td><?php echo $data['no_pbt']; ?></td>
				<td><?php echo $data['nib']; ?></td>
				<td><?php echo $data['no_gu']; ?></td>
				<td><?php echo $data['luas_pengukuran']; ?></td>
				<td><?php echo $data['tanda_batas']; ?></td>
				<td><?php echo $data['nama_user']; ?></td>
				<td>
					<a href="entri_persil.php?aksi=update&id=<?php echo $data['id_pengukuran']; ?>&nik_pemohon=<?php echo $data['nik_pemohon']; ?>&id_klaster=<?php echo $data['id_klaster']; ?>&nub=<?php echo $data['nub']; ?>&luas_pengukuran=<?php echo $data['luas_pengukuran']; ?>&penggunaan_tanah=<?php echo $data['penggunaan_tanah']; ?>&tanda_batas=<?php echo $data['tanda_batas']; ?>&no_pbt=<?php echo $data['no_pbt']; ?>&no_gu=<?php echo $data['no_gu']; ?>&no_berkas_fisik=<?php echo $data['no_berkas_fisik']; ?>&nib=<?php echo $data['nib']; ?>&id_user=<?php echo $data['id_user']; ?>">Edit</a>
				</td>
				<td>
					<a href="entri_persil.php?aksi=delete&id=<?php echo $data['id_pengukuran']; ?>" onClick="return confirm('Yakin akan menghapus user <?= $data['id_pengukuran']; ?>?')">Hapus</a>
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
		$id_pengukuran = $_POST['id_pengukuran'];
		$nik_pemohon = $_POST['nik_pemohon'];
		$id_klaster = $_POST['id_klaster'];
		$id_user = $_POST['id_user'];
        $nub = $_POST['nub'];
		$luas_pengukuran = $_POST['luas_pengukuran'];
		$penggunaan_tanah = $_POST['penggunaan_tanah'];
		$tanda_batas = $_POST['tanda_batas'];
		$no_pbt = $_POST['no_pbt'];
		$no_gu = $_POST['no_gu'];
		$no_berkas_fisik = $_POST['no_berkas_fisik'];
		$nib = $_POST['nib'];

		
		if(!empty($nub) && !empty($luas_pengukuran) && !empty($penggunaan_tanah) && !empty($tanda_batas)){
			$sql_update = "UPDATE pengukuran SET nub='$nub', nik_pemohon='$nik_pemohon', id_klaster='$id_klaster', luas_pengukuran='$luas_pengukuran',
	            penggunaan_tanah='$penggunaan_tanah',
	            tanda_batas='$tanda_batas', no_pbt='$no_pbt', no_gu='$no_gu' , no_berkas_fisik='$no_berkas_fisik', nib='$nib' 
				WHERE id_pengukuran=$id_pengukuran";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
					echo "<meta http-equiv='refresh' content='1;url=entri_persil.php'>";
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){

		?>
			<a href="entri_persil.php"> &laquo; Home</a> | 
			<a href="entri_persil.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			<h3>Ubah Data</h3>
			<form action="" method="POST">
			<fieldset>
				<div class="table-responsive">
					<table class="table table-responsive-sm table-hover" border="0">
						<tr>
							<td>	
								<input type="hidden" name="id_pengukuran" value="<?php echo $_GET['id'] ?>"/>
							</td>
						</tr>
						<tr>
							<td>Nama Pemohon </td>
							<?php 
						        	$datapemohon = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM pemohon");
									while ($pemohon = mysqli_fetch_assoc($sql)) {
									    $datapemohon[] = $pemohon;
									}
										
						        	 ?>
									 <?php foreach ($datapemohon as $key => $value)?>
							<td> : <input type="text" name="nik_pemohon" value="<?php $_GET['nik_pemohon']?><?= $value['nama_pemohon'] ?>" /></td>
						</tr>
						<tr>
							<td>Klaster </td>
							<?php 
						        	$dataklaster = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM klaster");
									while ($klaster = mysqli_fetch_assoc($sql)) {
									    $dataklaster[] = $klaster;
									}
										
						        	 ?>
									 <?php foreach ($dataklaster as $key => $value)?>
							<td> : <input type="text" name="id_klaster" value="<?php $_GET['id_klaster'] ?><?= $value['nama_klaster'] ?>" /></label></td>
						</tr>
						<tr>
							<td>NUB </td> 
							<td> : <input type="text" name="nub" value="<?php echo $_GET['nub'] ?>" required/></td>
						</tr>
						<tr>
							<td>Luas Pengukuran </td>
							<td> : <input type="text" name="luas_pengukuran" value="<?php echo $_GET['luas_pengukuran'] ?>" required /></td>
						</tr>
						<tr>
							<td>Penggunaan Tanah </td> 
							<td> : <input type="text" name="penggunaan_tanah" value="<?php echo $_GET['penggunaan_tanah'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>Tanda Batas </td> 
							<td> : <input type="text" name="tanda_batas" value="<?php echo $_GET['tanda_batas'] ?>" required/></td>
						</tr>
						<tr>
							<td>No. PBT </td>
							<td> : <input type="text" name="no_pbt" value="<?php echo $_GET['no_pbt'] ?>" required /></td>
						</tr>
						<tr>
							<td>No. GU </td> 
							<td> : <input type="text" name="no_gu" value="<?php echo $_GET['no_gu'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>No.Berkas Fisik </td> 
							<td> : <input type="text" name="no_berkas_fisik" value="<?php echo $_GET['no_berkas_fisik'] ?>" required/></td>
						</tr>
						<tr>
							<td>NIB </td>
							<td> : <input type="text" name="nib" value="<?php echo $_GET['nib'] ?>" required /></td>
						</tr>
						<tr>
							<td>Nama Petugas Pengukuran</td> 
							<td> : 
						        <select name="id_user" required>
						        	<?php 
						        	$datauser = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM user");
									while ($user = mysqli_fetch_assoc($sql)) {
									    $datauser[] = $user;
									}
										
						        	 ?>
						            <option disabled value="">-Pilih Desa-</option>
						            <?php foreach ($datauser as $key => $value):?>
						            <option value="<?= $value["id_user"] ?>"><?= $value["nama_user"] ?>
						            </option>
						        	<?php endforeach ?>
								</select>
					        </td>
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
		$sql_hapus = "DELETE FROM pengukuran WHERE id_pengukuran=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				echo "<meta http-equiv='refresh' content='1;url=entri_persil.php'>";
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
			echo '<a href="entri_persil.php"> &laquo; Home</a>';
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
