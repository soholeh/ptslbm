<?php $title = "Pembuatan Berkas | Dokumen";
include_once('../../_header.php');

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
                        <p>Nomor Berkas :</p>
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

                        <div class="row">

                        	<div class="col-xl-10 offset-xl-1">


<?php

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$kode_desa = $_POST['kode_desa'];
		$nama_desa = $_POST['nama_desa'];
		$kecamatan = $_POST['id_kecamatan'];
		$kabupaten = $_POST['kabupaten'];
		$reje_kampung = $_POST['reje_kampung'];
		$nama_camat = $_POST['nama_camat'];
		$nip = $_POST['nip'];
		$alamat = $_POST['alamat'];
		$kode_pos = $_POST['kode_pos'];
		
		if(!empty($kode_desa) && !empty($nama_desa) && !empty($kecamatan) && !empty($kabupaten) && !empty($reje_kampung)){

			$sql ="INSERT INTO desa
            (kode_desa,id_kecamatan,nama_desa,kabupaten,reje_kampung,nama_camat,nip,alamat,kode_pos)
            VALUES('$kode_desa','$kecamatan','$nama_desa','$kabupaten','$reje_kampung','$nama_camat','$nip','$alamat','$kode_pos')";

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
		<!--  -->

	<?php

}
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM desa LEFT JOIN kecamatan ON desa.id_kecamatan = kecamatan.id_kecamatan";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='desa' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr class='text-center'>";
			echo "<th>No</th>
				<th>Tipe</th>
				<th>Nomor</th>
				<th>Hapus</th>
				<th>Lihat</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	// while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td>1.</td>
				<td> Fotocopy KTP / KK Pemohon</td>
				<td><!-- <?php echo $data['nama_desa']; ?> -->x</td>
				<td>
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				</td>
				<td>
					<a href="entri/entri_pemohon.php">Lihat</a>
				</td>
			</tr>
			<tr>
				<td>2.</td>
				<td>Bukti Alas Hak</td>
				<td><!-- <?php echo $data['nama_desa']; ?> -->x</td>
				<td>
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				</td>
				<td>
					<a href="entri/entri_bukti_alas_hak.php">Lihat</a>
				</td>
			</tr>
			<tr>
				<td>3.</td>
				<td>Persil</td>
				<td><!-- <?php echo $data['nama_desa']; ?> -->x</td>
				<td>
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				</td>
				<td>
					<a href="entri/entri_persil.php">Lihat</a>
				</td>
			</tr>
			<tr>
				<td>4.</td>
				<td>Risalah</td>
				<td><!-- <?php echo $data['nama_desa']; ?> -->x</td>
				<td>
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a>
				</td>
				<td>
					<a href="entri/entri_risalah_panitia.php">Lihat</a>
				</td>
			</tr>
			

		<?php
	// }
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
		$id_desa = $_POST['id_desa'];
		$kode_desa = $_POST['kode_desa'];
		$nama_desa = $_POST['nama_desa'];
		$kecamatan = $_POST['kecamatan'];
		$kabupaten = $_POST['kabupaten'];
		$reje_kampung = $_POST['reje_kampung'];
		$nama_camat = $_POST['nama_camat'];
		$nip = $_POST['nip'];
		$alamat = $_POST['alamat'];
		$kode_pos = $_POST['kode_pos'];
		
		if(!empty($kode_desa) && !empty($nama_desa) && !empty($kecamatan) && !empty($kabupaten) && !empty($reje_kampung)){
			$sql_update = "UPDATE desa SET kode_desa='$kode_desa', nama_desa='$nama_desa',
	            id_kecamatan='$kecamatan',
	            kabupaten='$kabupaten', reje_kampung='$reje_kampung', nama_camat='$nama_camat', nip='$nip', alamat='$alamat', kode_pos='$kode_pos' WHERE id_desa=$id_desa";
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
								<input type="hidden" name="id_desa" value="<?php echo $_GET['id'] ?>"/>
							</td>
						</tr>
						<tr>
							<td>Kode Desa </td>
							<td> : <input type="number" name="kode_desa" value="<?php echo $_GET['kode_desa'] ?>" required /></td>
						</tr>
						<tr>
							<td>Nama Desa </td> 
							<td> : <input type="text" name="nama_desa" value="<?php echo $_GET['nama_desa'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>Kecamatan</td> 
							<td> : 
						        <select name="kecamatan" required>
						        	<?php 
						        	$datacamat = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM kecamatan");
									while ($camat = mysqli_fetch_assoc($sql)) {
									    $datacamat[] = $camat;
									}
										$sql = "SELECT * FROM desa WHERE id_desa='$_GET[id]'";
										$result = mysqli_query($koneksi, $sql);

										$desa = mysqli_fetch_assoc($result);
						        	 ?>
									            <option disabled value="">-Pilih Kecamatan-</option>
									            <?php foreach ($datacamat as $key => $value):?>
									            <option value="<?= $value["id_kecamatan"] ?>" <?php if($desa["id_kecamatan"]==$value["id_kecamatan"]){ echo "selected"; } ?> >
									            <?= $value["nama_kecamatan"] ?>
									            </option>
									        	<?php endforeach ?>
								</select>
					        </td>
					    </tr>
						<tr>
							<td>Kabupaten </td> 
							<td> : <input type="text" name="kabupaten" value="<?php echo $_GET['kabupaten'] ?>" required/></td>
						</tr>
						<tr>
							<td>Reje Kampung </td> 
							<td> : <input type="text" name="reje_kampung" value="<?php echo $_GET['reje_kampung'] ?>" required/></td>
						</tr>
						<tr>
							<td>Nama Camat </td> 
							<td> : <input type="text" name="nama_camat" value="<?php echo $_GET['nama_camat'] ?>" /></td>
						</tr>
						<tr>
							<td>NIP </td> 
							<td> : <input type="number" name="nip" value="<?php echo $_GET['nip'] ?>" /></td>
						</tr>
						<tr>
							<td>Alamat </td> 
							<td> : <textarea name="alamat" row="4" cols="23"><?php echo $_GET['alamat'] ?></textarea></td>
						</tr>
						<tr>
							<td>Kode Pos </td> 
							<td> : <input type="number" name="kode_pos" value="<?php echo $_GET['kode_pos'] ?>" /></td>
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
	}
	
}
// --- Tutup Fungsi Update


// --- Fungsi Delete
function hapus($koneksi){

	if(isset($_GET['id']) && isset($_GET['aksi'])){
		$id = $_GET['id'];
		$sql_hapus = "DELETE FROM tabel_panen WHERE id=" . $id;
		$hapus = mysqli_query($koneksi, $sql_hapus);
		
		if($hapus){
			if($_GET['aksi'] == 'delete'){
				header('location: index.php');
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


<?php include_once('../../_footer.php'); ?>
<!-- <script type="text/javascript" charset="utf8">
            $(document).ready( function () {
                $('#desa').DataTable(
                    {
                        "pageLength": 4,
                        responsive: false,
                        select: true
                    }
                    );
            } );
        </script> -->
