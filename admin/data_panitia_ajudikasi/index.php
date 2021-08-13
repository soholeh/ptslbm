<?php $title = "Entri Data Panitia Ajudikasi";
include_once('../_header.php');

?>

			<div id="layoutSidenav_content">
                <main>
                    <?php 
                    if (!isset($_SESSION['admin'])) {
                        echo    "<script>
                                alert('Anda Bukan Admin');
                                location='../pemb_berkas';
                            </script>";
                        } 
                     ?>
                    <div class="container-fluid">
                        <ol>
                            <li class="breadcrumb-item">
                               <h3> Entri Data Panitia Ajudikasi</h3>
                            </li>
                        </ol>

                        <div class="row">

                        	<div class="col-xl-auto offset-xl-1">


<?php

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$nama_pegawai = $_POST['nama_pegawai'];
		$NIP = $_POST['nip'];
		$golongan = $_POST['golongan'];
		$jabatan = $_POST['jabatan'];
		$id_proyek = $_POST['id_proyek'];
		$id_jabatan_ajudikasi = $_POST['id_jabatan_ajudikasi'];
				

		
		if(!empty($nama_pegawai) && !empty($NIP) && !empty($golongan) && !empty($jabatan) && !empty($id_proyek) && !empty($id_jabatan_ajudikasi)){

			$sql ="INSERT INTO panitia_ajudikasi
            (nama_pegawai,nip,golongan,jabatan,id_proyek,id_jabatan_ajudikasi)
            VALUES('$nama_pegawai','$NIP','$golongan','$jabatan','$id_proyek','$id_jabatan_ajudikasi')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data panitia ajudikasi belum lengkap!";
		}
	}

	?> 

<form action="" method="POST">
			<fieldset>
				<div class="table-responsive">
					<table class="table table-responsive-sm table-hover" border="0">
						<tr>    
                        <td>Nama Proyek</td> 
							<td> : 
						        <select name="id_proyek" required>
						        	<?php 
										$dataproyek = array();
										$sql = mysqli_query($koneksi, "SELECT * FROM proyek");
										while ($proyek = mysqli_fetch_assoc($sql)) {
										    $dataproyek[] = $proyek;
										}
									?>
						            <option disabled selected value="">-Pilih Proyek-</option>
						            <?php foreach ($dataproyek as $key => $value):?>
						            <option value="<?= $value["id_proyek"] ?>"><?= $value["nama_proyek"] ?> / <?= $value["tahun_proyek"] ?></option>
						            <?php endforeach ?>
						        </select>
					        </td>
                        </tr>
						<tr>
							<td>Nama Pegawai</td> 
							<td> : <input type="text" name="nama_pegawai" required /></label></td>
						</tr>
						<tr>
							<td>NIP </td> 
							<td> : <input type="text" name="nip" required/></td>
						</tr>
                        <tr>
							<td>Golongan </td> 
							<td> : <input type="text" name="golongan" required/></td>
						</tr>
                        <tr>
							<td>Jabatan </td> 
							<td> : <input type="text" name="jabatan" required/></td>
						</tr>
						<tr>
							<td>Jabatan Ajudikasi</td> 
							<td> : 
						        <select name="id_jabatan_ajudikasi" required>
						        	<?php 
										$datajabatanajudikasi = array();
										$sql = mysqli_query($koneksi, "SELECT * FROM jabatan_ajudikasi");
										while ($jabatanajudikasi = mysqli_fetch_assoc($sql)) {
										    $datajabatanajudikasi[] = $jabatanajudikasi;
										}

									?>
						            <option disabled selected value="">-Pilih Jabatan Ajudikasi-</option>
						            <?php foreach ($datajabatanajudikasi as $key => $value):?>
						            <option value="<?= $value["id_jabatan_ajudikasi"] ?>"><?= $value["jabatan_ajudikasi"] ?></option>
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

	<?php

}
// --- Tutup Fngsi tambah data

// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM panitia_ajudikasi LEFT JOIN proyek ON panitia_ajudikasi.id_proyek = proyek.id_proyek LEFT JOIN jabatan_ajudikasi ON panitia_ajudikasi.id_jabatan_ajudikasi = jabatan_ajudikasi.id_jabatan_ajudikasi";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr>";
			echo "<th>No</th>
				<th>Nama Pegawai</th>
				<th>NIP</th>
				<th>Jabatan Ajudikasi</th>
				<th>Nama Proyek</th>
				<th>Edit</th>
				<th>Hapus</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_pegawai']; ?></td>
				<td><?php echo $data['NIP']; ?></td>
				<td><?php echo $data['jabatan_ajudikasi']; ?></td>
				<td><?php echo $data['nama_proyek'];?>/ <?php echo $data['tahun_proyek'];?></td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['NIP']; ?>&NIP=<?php echo $data['NIP']; ?>&nama_pegawai=<?php echo $data['nama_pegawai']; ?>&golongan=<?php echo $data['golongan']; ?>&jabatan=<?php echo $data['jabatan']; ?>&=<?php echo $data['jabatan_ajudikasi']; ?>">Edit</a>
				</td>
				<td>
					<a href="index.php?aksi=delete&id=<?php echo $data['NIP']; ?>" onClick="return confirm('Yakin akan menghapus user <?= $data['nama_user']; ?>?')">Hapus</a>
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
		$nama_pegawai = $_POST['nama_pegawai'];
		$golongan = $_POST['golongan'];
		$jabatan = $_POST['jabatan'];
		$NIP = $_POST['nip'];
		$id_proyek = $_POST['id_proyek'];
		$id_jabatan_ajudikasi = $_POST['id_jabatan_ajudikasi'];

		
		if(!empty($nama_pegawai) && !empty($NIP) && !empty($golongan) && !empty($jabatan) && !empty($id_proyek) && !empty($id_jabatan_ajudikasi)){
			$sql_update = "UPDATE panitia_ajudikasi SET nama_pegawai='$nama_pegawai', nip='$NIP',
	            golongan='$golongan', jabatan='$jabatan',
	            id_proyek='$id_proyek', id_jabatan_ajudikasi='$id_jabatan_ajudikasi' WHERE nip=$NIP";
			$update = mysqli_query($koneksi, $sql_update);
			if($update && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'update'){
					echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
					echo "<meta http-equiv='refresh' content='1;url=index.php'>";
				}
			}
		} else {
			$pesan = "Data tidak lengkap!";
		}
	}
	
	// tampilkan form ubah
	if(isset($_GET['id'])){

		?>
			<a href="index.php"> &laquo; Home</a> | 
			<a href="index.php?aksi=create"> (+) Tambah Data</a>
			<hr>
			<h3>Ubah Data</h3>
			<form action="" method="POST">
			<fieldset>
				<div class="table-responsive">
					<table class="table table-responsive-sm table-hover" border="0">
					<tr>
					<tr>
							<td>Nama Proyek</td> 
							<td> : 
						        <select name="id_proyek" required>
						        	<?php 
						        	$dataproyek = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM proyek");
									while ($proyek = mysqli_fetch_assoc($sql)) {
									    $dataproyek[] = $proyek;
									}
										$sql = "SELECT * FROM panitia_ajudikasi WHERE nip='$_GET[id]'";
										$result = mysqli_query($koneksi, $sql);

										$proyek = mysqli_fetch_assoc($result);
						        	 ?>
						            <option disabled value="">-Pilih Proyek-</option>
						            <?php foreach ($dataproyek as $key => $value):?>
						            <option value="<?= $value["id_proyek"] ?>" <?php if($proyek["id_proyek"]==$value["id_proyek"]){ echo "selected"; } ?> >
						            <?= $value["nama_proyek"] ?> / <?= $value["tahun_proyek"] ?>
						            </option>
						        	<?php endforeach ?>
								</select>
					        </td>
					    </tr>
							</tr>
							<tr>
								<td>Nama Pegawai</td> 
								<td> : <input type="text" name="nama_pegawai" value="<?= $_GET['nama_pegawai'] ?>" required /></label></td>
							</tr>
							<tr>
								<td>NIP </td> 
								<td> : <input type="text" name="nip" value="<?= $_GET['NIP'] ?>" disabled/></td>
							</tr>
							<tr>
								<td>Golongan </td> 
								<td> : <input type="text" name="golongan" value="<?= $_GET['golongan'] ?>" required/></td>
							</tr>
							<tr>
								<td>Jabatan </td> 
								<td> : <input type="text" name="jabatan" value="<?= $_GET['jabatan'] ?>" required/></td>
							</tr>
							<tr>
							<td>Jabatan Ajudikasi</td> 
							<td> : 
						        <select name="id_jabatan_ajudikasi" required>
						        	<?php 
						        	$datajabatanajudikasi = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM jabatan_ajudikasi");
									while ($jabatanajudikasi = mysqli_fetch_assoc($sql)) {
									    $datajabatanajudikasi[] = $jabatanajudikasi;
									}
										$sql = "SELECT * FROM panitia_ajudikasi WHERE nip='$_GET[id]'";
										$result = mysqli_query($koneksi, $sql);

										$jabatanajudikasi = mysqli_fetch_assoc($result);
						        	 ?>
						            <option disabled value="">-Pilih Jabatan Ajudikasi-</option>
						            <?php foreach ($datajabatanajudikasi as $key => $value):?>
						            <option value="<?= $value["id_jabatan_ajudikasi"] ?>" <?php if($jabatanajudikasi["id_jabatan_ajudikasi"]==$value["id_jabatan_ajudikasi"]){ echo "selected"; } ?> >
						            <?= $value["jabatan_ajudikasi"] ?>
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
		$sql_hapus = "DELETE FROM panitia_ajudikasi WHERE NIP=" . $id;
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
			echo '<a href="index.php"> &laquo; Home</a>';
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


<?php include_once('../_footer.php'); ?>
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
