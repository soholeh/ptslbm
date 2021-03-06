<?php $title = "Entri Data Pemohon";
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
                        <p>Entri Data Pemohon Nomor Berkas :</p>
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
		$nama_pemohon = $_POST['nama_pemohon'];
		$no_telp = $_POST['no_telp'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan = $_POST['pekerjaan'];
		$agama = $_POST['agama'];
		$desa_pemohon = $_POST['desa_pemohon'];
		$id_jk = $_POST['id_jk'];
		$kecamatan_pemohon = $_POST['kecamatan_pemohon'];
		$id_jenis_pemohon = $_POST['id_jenis_pemohon'];
		$kabupaten = $_POST['kabupaten'];

		
		if(!empty($nik_pemohon) && !empty($nama_pemohon) && !empty($no_telp) && !empty($desa_pemohon) && !empty($tempat_lahir) &&
			!empty($tanggal_lahir) && !empty($pekerjaan) && !empty($agama) &&
			!empty($id_jk) && !empty($kecamatan_pemohon) && !empty($id_jenis_pemohon) && !empty($kabupaten)){

			$sql ="INSERT INTO pemohon
            (nik_pemohon,nama_pemohon,no_telp,tempat_lahir,tanggal_lahir,pekerjaan,agama,desa_pemohon,id_jk
			,kecamatan_pemohon, id_jenis_pemohon, kabupaten)
            VALUES('$nik_pemohon','$nama_pemohon','$no_telp','$tempat_lahir','$tanggal_lahir'
			,'$pekerjaan','$agama','$desa_pemohon','$id_jk','$kecamatan_pemohon','$id_jenis_pemohon','$kabupaten')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: entri_pemohon.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data pemohon belum lengkap!";
		}
	}

	?> 
	<dir class="row">
		<div class="col-xl-6">
		<form action="" method="POST">
					<fieldset>
						<div class="table-responsive">
							<table class="table table-responsive-sm table-hover" border="0">
								<tr>
									<td>NIK </td>
									<td> : <input type="text" name="nik_pemohon" required /></td>
								</tr>
								<tr>
									<td>No. Telepon / HP</td> 
									<td> : <input type="text" name="no_telp" required /></label></td>
								</tr>
								<tr>
									<td>Nama Pemohon </td> 
									<td> : <input type="text" name="nama_pemohon" required/></td>
								</tr>
								<tr>
									<td>Tempat Lahir</td> 
									<td> : <input type="text" name="tempat_lahir" required/></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td> 
									<td> : <input type="date" name="tanggal_lahir" required/></td>
								</tr>
								<tr>
									<td>Pekerjaan </td> 
									<td> : <input type="text" name="pekerjaan" required/></td>
								</tr>
								<tr>
									<td>Agama </td> 
									<td> : <input type="text" name="agama" required/></td>
								</tr>
								<tr>
									
								</tr>

							</table>
							<br>
							<?php 
		// echo "<pre>";
		// print_r($datadesa);
		// echo "</pre>";
							 ?>
						</div>
					</fieldset>
				
	</div>
	<div class="col-xl-6">
		
					<fieldset>
						<div class="table-responsive">
							<table class="table table-responsive-sm table-hover" border="0">
								<tr>
									<td>Jenis Kelamin</td> 
									<td> : 
								        <select name="id_jk" required>
								        	<?php 
												$datajk = array();
												$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
												while ($jk = mysqli_fetch_assoc($sql)) {
												    $datajk[] = $jk;
												}

											?>
								            <option disabled selected value="">-Jenis Kelamin-</option>
								            <?php foreach ($datajk as $key => $value):?>
								            <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
								            <?php endforeach ?>
										</select>
							        </td>
							    </tr>
								<tr>
									<td>Alamat</td> 
									<td> : </td>
								</tr>
								<tr>
									<td>Desa</td> 
									<td> : 
										<input type="text" name="desa_pemohon" require></input>
									</td>
								</tr>
								<tr>
									<td>Kecamatan</td> 
									<td> : 
									<input type="text" name="kecamatan_pemohon" require></input>
									</td>
								</tr>
								<tr>
									<td>Kabupaten </td>
									<td> : <input type="text" name="kabupaten" /></td>
								</tr>
							    <tr>
									<td>Jenis Pemohon</td> 
									<td> : 
								        <select name="id_jenis_pemohon" required>
								        	<?php 
												$datajenispemohon = array();
												$sql = mysqli_query($koneksi, "SELECT * FROM jenis_pemohon");
												while ($jenispemohon = mysqli_fetch_assoc($sql)) {
												    $datajenispemohon[] = $jenispemohon;
												}
											?>
								            <option disabled selected value="">-Pilih Jenis Pemohon-</option>
								            <?php foreach ($datajenispemohon as $key => $value):?>
								            <option value="<?= $value["id_jenis_pemohon"] ?>"><?= $value["jenis_pemohon"] ?></option>
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

						<p><?php echo isset($pesan) ? $pesan : "" ?></p>
					</fieldset>
				</form>
	</dir>
	
	</div>
                        <div class="row">

                        	<div class="col-xl-auto offset-xl-1">		

	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM pemohon LEFT JOIN jenis_pemohon ON pemohon.id_jenis_pemohon = jenis_pemohon.id_jenis_pemohon ";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr>";
			echo "<th>No</th>
				<th>Nama Pemohon</th>
				<th>NIK</th>
				<th>Jenis Pemohon</th>
				<th>No. Telepon / No HP</th>
				<th>Alamat</th>
				<th>Edit</th>
				<th>Hapus</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_pemohon']; ?></td>
				<td><?php echo $data['nik_pemohon']; ?></td>
				<td><?php echo $data['jenis_pemohon']; ?></td>
				<td><?php echo $data['no_telp']; ?></td>
				<td><?php echo $data['desa_pemohon']; ?>, <?= $data['kecamatan_pemohon'];?>, <?= $data['kabupaten'];?></td>
				<td>
					<a href="entri_pemohon.php?aksi=update&id=<?php echo $data['nik_pemohon']; ?>&nama_pemohon=<?php echo $data['nama_pemohon']; ?>&no_telp=<?php echo $data['no_telp']; ?>
							&tanggal_lahir=<?php echo $data['tanggal_lahir'];?>&tempat_lahir=<?php echo $data['tempat_lahir'];?>&pekerjaan=<?php echo $data['pekerjaan'];?>
							&agama=<?php echo $data['agama'];?>&id_jk=<?php echo $data['id_jk'];?>&desa_pemohon=<?php echo $data['desa_pemohon'];?>
							&kecamatan_pemohon=<?php echo $data['kecamatan_pemohon'];?>&kabupaten=<?php echo $data['kabupaten'];?>">Edit</a>
				</td>
				<td>
					<a href="entri_pemohon.php?aksi=delete&id=<?php echo $data['nik_pemohon']; ?>" onClick="return confirm('Yakin akan menghapus user <?= $data['nama_pemohon']; ?>?')">Hapus</a>
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
		$nik_pemohon = $_POST['nik_pemohon'];
		$nama_pemohon = $_POST['nama_pemohon'];
		$no_telp = $_POST['no_telp'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$pekerjaan = $_POST['pekerjaan'];
		$agama = $_POST['agama'];
		$desa_pemohon = $_POST['desa_pemohon'];
		$id_jk = $_POST['id_jk'];
		$kecamatan_pemohon = $_POST['kecamatan_pemohon'];
		$id_jenis_pemohon = $_POST['id_jenis_pemohon'];
		$kabupaten = $_POST['kabupaten'];
		
		if(!empty($nik_pemohon) && !empty($nama_pemohon) && !empty($no_telp) && !empty($desa_pemohon) && !empty($tempat_lahir) &&
		!empty($tanggal_lahir) && !empty($pekerjaan) && !empty($agama) &&
		!empty($id_jk) && !empty($kecamatan_pemohon) && !empty($id_jenis_pemohon) && !empty($kabupaten)){
			$sql_update = "UPDATE pemohon SET nik_pemohon='$nik_pemohon', nama_pemohon='$nama_pemohon', no_telp='$no_telp',
				tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', pekerjaan='$pekerjaan',
	            agama='$agama',	desa_pemohon='$desa_pemohon', id_jk='$id_jk', kecamatan_pemohon='$kecamatan_pemohon', 
				id_jenis_pemohon='$id_jenis_pemohon', kabupaten='$kabupaten' WHERE nik_pemohon=$nik_pemohon";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
					echo "<meta http-equiv='refresh' content='1;url=entri_pemohon.php'>";
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){

		?>
			<a href="entri_pemohon.php"> &laquo; Home</a> | 
			<a href="entri_pemohon.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			<h3>Ubah Data</h3>
			<dir class="row">
			<div class="col-xl-6">
			<form action="" method="POST">
			<fieldset>
				<div class="table-responsive">
				<table class="table table-responsive-sm table-hover" border="0">
								<tr>
									<td>NIK </td>
									<td> : <input type="text" name="nik_pemohon" value="<?php echo $_GET['id'] ?>" hidden/><?php echo $_GET['id'] ?></td>
								</tr>
								<tr>
									<td>No. Telepon / HP</td> 
									<td> : <input type="text" name="no_telp" value="<?php echo $_GET['no_telp'] ?>" /></label></td>
								</tr>
								<tr>
									<td>Nama Pemohon </td> 
									<td> : <input type="text" name="nama_pemohon" value="<?php echo $_GET['nama_pemohon'] ?>"/></td>
								</tr>
								<tr>
									<td>Tempat Lahir</td> 
									<td> : <input type="text" name="tempat_lahir" value="<?php echo $_GET['tempat_lahir'] ?>"/></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td> 
									<td> : <input type="date" name="tanggal_lahir" value="<?php echo $_GET['tanggal_lahir'] ?>"/></td>
								</tr>
								<tr>
									<td>Pekerjaan </td> 
									<td> : <input type="text" name="pekerjaan" value="<?php echo $_GET['pekerjaan'] ?>"/></td>
								</tr>
								<tr>
									<td>Agama </td> 
									<td> : <input type="text" name="agama" value="<?php echo $_GET['agama'] ?>"/></td>
								</tr>
								<tr>
								
								</tr>

							</table>
							<br>
							<?php 
		// echo "<pre>";
		// print_r($datadesa);
		// echo "</pre>";
							 ?>
						</div>
					</fieldset>
				
	</div>
	<div class="col-xl-6">
		
					<fieldset>
						<div class="table-responsive">
							<table class="table table-responsive-sm table-hover" border="0">
								<tr>
								<td>Jenis Kelamin</td> 
								<td> : 
									<select name="id_jk" required>
										<?php 
											$datajk = array();
											$sql = mysqli_query($koneksi, "SELECT * FROM jenis_kelamin");
											while ($jk = mysqli_fetch_assoc($sql)) {
												$datajk[] = $jk;
											}
											$sql = "SELECT * FROM pemohon  WHERE nik_pemohon='$_GET[id]'";
											$result = mysqli_query($koneksi, $sql);

											$jk = mysqli_fetch_assoc($result);
										?>
										<option disabled value="">-Pilih Jenis Kelamin-</option>
										<?php foreach ($datajk as $key => $value):?>
										<option value="<?= $value["id_jk"] ?>" <?php if($jk["id_jk"]==$value["id_jk"]){ echo "selected"; } ?> >
										<?= $value["nama_jk"] ?>
										</option>
										<?php endforeach ?>
									</select>
								</td>
							    </tr>
								<tr>
									<td>Alamat</td> 
									<td> : </td>
								</tr>
								<tr>
									<td>Desa</td> 
									<td> : <input type="text" name="desa_pemohon" value="<?php echo $_GET['desa_pemohon'] ?>"/></td>
									</tr>
									<tr>
									<td>Kecamatan</td> 
									<td> : <input type="text" name="kecamatan_pemohon" value="<?php echo $_GET['kecamatan_pemohon'] ?>"/></td>
								</tr>
								<tr>
									<td>Kabupaten </td>
									<td> : <input type="text" name="kabupaten" value="<?php echo $_GET['kabupaten'] ?>"/></td>
								</tr>
							    <tr>
									<td>Jenis Pemohon</td> 
								<td> : 
									<select name="id_jenis_pemohon" required>
										<?php 
											$datajenispemohon = array();
											$sql = mysqli_query($koneksi, "SELECT * FROM jenis_pemohon");
											while ($jenispemohon = mysqli_fetch_assoc($sql)) {
												$datajenispemohon[] = $jenispemohon;
											}
											$sql = "SELECT * FROM pemohon  WHERE nik_pemohon='$_GET[id]'";
											$result = mysqli_query($koneksi, $sql);

											$jenispemohon = mysqli_fetch_assoc($result);
										?>
										<option disabled selected value="">-Pilih Jenis Pemohon-</option>
										<?php foreach ($datajenispemohon as $key => $value):?>
										<option value="<?= $value["id_jenis_pemohon"] ?>" <?php if($jenispemohon["id_jenis_pemohon"]==$value["id_jenis_pemohon"]){ echo "selected"; } ?> >
										<?= $value["jenis_pemohon"] ?>
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
		</dir>

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
		$sql_hapus = "DELETE FROM pemohon WHERE nik_pemohon=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				echo "<meta http-equiv='refresh' content='1;url=entri_pemohon.php'>";
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
			echo '<a href="entri_pemohon.php"> &laquo; Home</a>';
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
