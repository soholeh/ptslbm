<?php $title = "Entri Data Pengukuran";
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
        $id_pengukuran = $_POST['id_pengukuran'];
		$id_pemohon = $_POST['id_pemohon'];
		$id_alash = $_POST['id_alash'];
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
            (id_pemohon,id_alash,id_user,nub,luas_pengukuran,penggunaan_tanah,tanda_batas,no_pbt,no_gu,no_berkas_fisik,nib)
            VALUES('$id_pemohon','$id_alash','$id_user','$nub','$luas_pengukuran','$penggunaan_tanah','$tanda_batas',
            '$no_pbt','$no_gu','$no_berkas_fisik','$nib')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: index.php');
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
							<td> : <input type="text" name="nama" required /></td>
						</tr>
						<tr>
							<td>Klaster </td> 
							<td> : <input type="text" name="user"  required /></label></td>
						</tr>
						<tr>
							<td>NUB </td> 
							<td> : <input type="password" name="password"  required/></td>
						</tr>
						<tr>
							<td>Luas Pengukuran </td>
							<td> : <input type="text" name="nama"  required /></td>
						</tr>
						<tr>
							<td>Penggunaan Tanah </td> 
							<td> : <input type="text" name="user"  required /></label></td>
						</tr>
						<tr>
							<td>Tanda Batas </td> 
							<td> : <input type="password" name="password"  required/></td>
						</tr>
						<tr>
							<td>No. PBT </td>
							<td> : <input type="text" name="nama"  required /></td>
						</tr>
						<tr>
							<td>No. GU </td> 
							<td> : <input type="text" name="user"  required /></label></td>
						</tr>
						<tr>
							<td>No.Berkas Fisik </td> 
							<td> : <input type="password" name="password"  required/></td>
						</tr>
						<tr>
							<td>NIB </td>
							<td> : <input type="text" name="nama"  required /></td>
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
	$sql = "SELECT * FROM user LEFT JOIN desa ON user.id_desa = desa.id_desa LEFT JOIN level ON user.id_level = level.id_level LEFT JOIN proyek ON user.id_proyek = proyek.id_proyek";
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
				<td><?php echo $data['user_nama']; ?></td>
				<td><?php echo $data['user_nama']; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data['nama_desa']; ?></td>
				<td><?php echo $data['nama_level']; ?></td>
				<td><?php echo $data['user_nama']; ?></td>
				<td><?php echo $data['user_nama']; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data['nama_desa']; ?></td>
				<td><?php echo $data['nama_level']; ?></td>
				<td><?php echo $data['nama_level']; ?></td>
				<td></td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['id_user']; ?>&nama_user=<?php echo $data['nama_user']; ?>&user_nama=<?php echo $data['user_nama']; ?>&password=<?php echo $data['password']; ?>&nama_desa=<?php echo $data['nama_desa']; ?>&nama_level=<?php echo $data['nama_level']; ?>">Edit</a>
				</td>
				<td>
					<a href="index.php?aksi=delete&id=<?php echo $data['id_user']; ?>" onClick="return confirm('Yakin akan menghapus user <?= $data['nama_user']; ?>?')">Hapus</a>
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
		$id_user = $_POST['id_user'];
		$nama = $_POST['nama'];
		$user = $_POST['user'];
		$password = $_POST['password'];
		$id_desa = $_POST['id_desa'];
		$id_level = $_POST['id_level'];
		$id_proyek = $_POST['id_proyek'];

		
		if(!empty($nama) && !empty($user) && !empty($password) && !empty($id_desa) && !empty($id_level)){
			$sql_update = "UPDATE user SET nama_user='$nama', user_nama='$user',
	            password='$password',
	            id_desa='$id_desa', id_level='$id_level', id_proyek='$id_proyek' WHERE id_user=$id_user";
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
							<td>	
								<input type="hidden" name="id_user" value="<?php echo $_GET['id'] ?>"/>
							</td>
						</tr>
						<tr>
							<td>Nama Pemohon </td>
							<td> : <input type="text" name="nama" value="<?php echo $_GET['nama_user'] ?>" required /></td>
						</tr>
						<tr>
							<td>Klaster </td> 
							<td> : <input type="text" name="user" value="<?php echo $_GET['user_nama'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>NUB </td> 
							<td> : <input type="password" name="password" value="<?php echo $_GET['password'] ?>" required/></td>
						</tr>
						<tr>
							<td>Luas Pengukuran </td>
							<td> : <input type="text" name="nama" value="<?php echo $_GET['nama_user'] ?>" required /></td>
						</tr>
						<tr>
							<td>Penggunaan Tanah </td> 
							<td> : <input type="text" name="user" value="<?php echo $_GET['user_nama'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>Tanda Batas </td> 
							<td> : <input type="password" name="password" value="<?php echo $_GET['password'] ?>" required/></td>
						</tr>
						<tr>
							<td>No. PBT </td>
							<td> : <input type="text" name="nama" value="<?php echo $_GET['nama_user'] ?>" required /></td>
						</tr>
						<tr>
							<td>No. GU </td> 
							<td> : <input type="text" name="user" value="<?php echo $_GET['user_nama'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>No.Berkas Fisik </td> 
							<td> : <input type="password" name="password" value="<?php echo $_GET['password'] ?>" required/></td>
						</tr>
						<tr>
							<td>NIB </td>
							<td> : <input type="text" name="nama" value="<?php echo $_GET['nama_user'] ?>" required /></td>
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
		$sql_hapus = "DELETE FROM user WHERE id_user=" . $id;
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
