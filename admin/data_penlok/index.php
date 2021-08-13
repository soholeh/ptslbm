<?php $title = "Entri Data Penlok";
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
                               <h3> Entri Data Penlok</h3>
                            </li>
                        </ol>

                        <div class="row">

                        	<div class="col-xl-auto offset-xl-1">


<?php

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$jumlah_persil = $_POST['jumlah_persil'];
		$no_sk_penlok = $_POST['no_sk_penlok'];
		$tgl_sk_penlok = $_POST['tgl_sk_penlok'];
		$id_proyek = $_POST['id_proyek'];
		$id_desa = $_POST['id_desa'];
        $id_kecamatan = $_POST['id_kecamatan'];
        
				

		
		if(!empty($jumlah_persil) && !empty($no_sk_penlok) && !empty($tgl_sk_penlok) && !empty($id_proyek) && !empty($id_desa)&& !empty($id_kecamatan)){

			$sql ="INSERT INTO penlok
            (jumlah_persil,no_sk_penlok,tgl_sk_penlok,id_proyek,id_desa,id_kecamatan)
            VALUES('$jumlah_persil','$no_sk_penlok','$tgl_sk_penlok','$id_proyek','$id_desa','$id_kecamatan')";

			$simpan = mysqli_query($koneksi, $sql);
			if($simpan && isset($_GET['aksi'])){
				if($_GET['aksi'] == 'create'){
					header('location: index.php');
				}
			}
		} else {
			$pesan = "Tidak dapat menyimpan, data penlok belum lengkap!";
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
							<td>Desa</td> 
							<td> : 
						        <select name="id_desa" required>
						        	<?php 
										$datadesa = array();
										$sql = mysqli_query($koneksi, "SELECT * FROM desa");
										while ($desa = mysqli_fetch_assoc($sql)) {
										    $datadesa[] = $desa;
										}

									?>
						            <option disabled selected value="">-Pilih Desa-</option>
						            <?php foreach ($datadesa as $key => $value):?>
						            <option value="<?= $value["id_desa"] ?>"><?= $value["nama_desa"] ?></option>
						            <?php endforeach ?>
								</select>
					        </td>
					    </tr>
                        <tr>
							<td>Kecamatan</td> 
							<td> : 
						        <select name="id_kecamatan" required>
						        	<?php 
										$datakecamatan = array();
										$sql = mysqli_query($koneksi, "SELECT * FROM kecamatan");
										while ($kecamatan = mysqli_fetch_assoc($sql)) {
										    $datakecamatan[] = $kecamatan;
										}

									?>
						            <option disabled selected value="">-Pilih Kecamatan-</option>
						            <?php foreach ($datakecamatan as $key => $value):?>
						            <option value="<?= $value["id_kecamatan"] ?>"><?= $value["nama_kecamatan"] ?></option>
						            <?php endforeach ?>
								</select>
					        </td>
					    </tr>
						<tr>
							<td>Jumlah Persil</td> 
							<td> : <input type="text" name="jumlah_persil" required /></label></td>
						</tr>
						<tr>
							<td>No. SK Penlok </td> 
							<td> : <input type="text" name="no_sk_penlok" required/></td>
						</tr>
                        <tr>
							<td>Tgl. SK Penlok </td> 
							<td> : <input type="date" name="tgl_sk_penlok" required/></td>
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
	$sql = "SELECT * FROM penlok LEFT JOIN desa ON penlok.id_desa = desa.id_desa LEFT JOIN kecamatan ON penlok.id_kecamatan = kecamatan.id_kecamatan LEFT JOIN proyek ON penlok.id_proyek = proyek.id_proyek";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr>";
			echo "<th>No</th>
				<th>Nama Proyek</th>
				<th>Tahun</th>
				<th>No. SK Penlok</th>
				<th>Tgl. SK Penlok</th>
				<th>Desa</th>
                <th>Kecamatan</th>
                <th>Jumlah Persil</th>
                <th>Luas Persil (M2)</th>
				<th>Edit</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_proyek']; ?></td>
				<td><?php echo $data['tahun_proyek']; ?></td>
				<td><?php echo $data['no_sk_penlok']; ?></td>
				<td><?php echo $data['tgl_sk_penlok']; ?></td>
				<td><?php echo $data['nama_desa']; ?></td>
                <td><?php echo $data['nama_kecamatan']; ?></td>
                <td><?php echo $data['jumlah_persil']; ?></td>
                <td><?php echo "Luas Persil"; ?></td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['id_penlok']; ?>&no_sk_penlok=<?php echo $data['no_sk_penlok']; ?>&tgl_sk_penlok=<?php echo $data['tgl_sk_penlok']; ?>&jumlah_persil=<?php echo $data['jumlah_persil']; ?>&nama_desa=<?php echo $data['nama_desa']; ?>&nama_kecamatan=<?php echo $data['nama_kecamatan']; ?>">Edit</a>
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
		$jumlah_persil = $_POST['jumlah_persil'];
		$no_sk_penlok = $_POST['no_sk_penlok'];
		$tgl_sk_penlok = $_POST['tgl_sk_penlok'];
		$id_proyek = $_POST['id_proyek'];
		$id_desa = $_POST['id_desa'];
        $id_kecamatan = $_POST['id_kecamatan'];
        $id_penlok = $_POST['id_penlok'];

		
		if(!empty($jumlah_persil) && !empty($no_sk_penlok) && !empty($tgl_sk_penlok) && !empty($id_desa) && !empty($id_proyek)){
			$sql_update = "UPDATE penlok SET jumlah_persil='$jumlah_persil', no_sk_penlok='$no_sk_penlok',
	                        tgl_sk_penlok='$tgl_sk_penlok',
	                        id_desa='$id_desa', id_kecamatan='$id_levid_kecamatanel', id_proyek='$id_proyek' WHERE id_penlok=$id_penlok";
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
                        <tr>
							<td>Desa</td> 
							<td> : 
						        <select name="id_desa" required>
						        	<?php 
						        	$datadesa = array();
									$sql = mysqli_query($koneksi, "SELECT * FROM desa");
									while ($desa = mysqli_fetch_assoc($sql)) {
									    $datadesa[] = $desa;
									}
										$sql = "SELECT * FROM penlok  WHERE id_penlok='$_GET[id]'";
										$result = mysqli_query($koneksi, $sql);

										$desa = mysqli_fetch_assoc($result);
						        	 ?>
						            <option disabled value="">-Pilih Desa-</option>
						            <?php foreach ($datadesa as $key => $value):?>
						            <option value="<?= $value["id_desa"] ?>" <?php if($desa["id_desa"]==$value["id_desa"]){ echo "selected"; } ?> >
						            <?= $value["nama_desa"] ?>
						            </option>
						        	<?php endforeach ?>
								</select>
					        </td>
					    </tr>
                        <tr>
							<td>Kecamatan</td> 
							<td> : 
						        <select name="id_kecamatan" required>
						        	<?php 
										$datakecamatan = array();
										$sql = mysqli_query($koneksi, "SELECT * FROM kecamatan");
										while ($kecamatan = mysqli_fetch_assoc($sql)) {
										    $datakecamatan[] = $kecamatan;
										}
                                        $sql = "SELECT * FROM penlok  WHERE id_penlok='$_GET[id]'";
										$result = mysqli_query($koneksi, $sql);

										$kecamatan = mysqli_fetch_assoc($result);
									?>
						            <option disabled selected value="">-Pilih Kecamatan-</option>
						            <?php foreach ($datakecamatan as $key => $value):?>
						            <option value="<?= $value["id_kecamatan"] ?>" <?php if($kecamatan["id_kecamatan"]==$value["id_kecamatan"]){ echo "selected"; } ?> >
						            <?= $value["nama_kecamatan"] ?>
                                    </option>
						            <?php endforeach ?>
								</select>
					        </td>
					    </tr>
						<tr>
							<td>Jumlah Persil </td>
							<td> : <input type="text" name="jumlah_persil" value="<?php echo $_GET['jumlah_persil'] ?>" required /></td>
						</tr>
						<tr>
							<td>No. SK Penlok</td> 
							<td> : <input type="text" name="no_sk_penlok" value="<?php echo $_GET['no_sk_penlok'] ?>" required /></label></td>
						</tr>
						<tr>
							<td>Tgl. SK Penlok </td> 
							<td> : <input type="date" name="tgl_sk_penlok" value="<?php echo $_GET['tgl_sk_penlok'] ?>" required/></td>
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
/*
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
	
}*/
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
        /*
		case "delete":
			hapus($koneksi);
			break;
		*/
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
