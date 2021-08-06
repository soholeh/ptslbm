<?php $title = "Entri Data Proyek";
include_once('../_header.php');

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
                        <ol>
                            <li class="breadcrumb-item">
                               <h3> Entri Data Proyek</h3>
                            </li>
                        </ol>

                        <div class="row">

                        	<div class="col-xl-auto offset-xl-1">


<?php

// --- Fngsi tambah data (Create)
function tambah($koneksi){
	
	if (isset($_POST['btn_simpan'])){
		$nama_proyek = $_POST['nama_proyek'];
		$tahun_proyek = $_POST['tahun_proyek'];

		
		if(!empty($nama_proyek) && !empty($tahun_proyek)){

			$sql ="INSERT INTO proyek
            (nama_proyek,tahun_proyek)
            VALUES('$nama_proyek','$tahun_proyek')";

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
		<form action="" method="POST">
			<fieldset>
				<div class="table-responsive">
					<table class="table table-responsive-sm table-hover" border="0">
						<tr>
							<td>Nama Proyek</td>
							<td> : <input type="text" name="nama_proyek" required /></td>
						</tr>
						<tr>
							<td>Tahun Proyek</td> 
							<td> : <input type="number" name="tahun_proyek" required /></label></td>
						</tr>
						<tr>
							<td></td>
							<td><label class="ml-2">
									<input type="submit" name="btn_simpan" value="Simpan"/>
									<input type="reset" name="reset" value="Besihkan"/>
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
// --- Tutup Fngsi tambah data


// --- Fungsi Baca Data (Read)
function tampil_data($koneksi){
	$sql = "SELECT * FROM proyek";
	$query = mysqli_query($koneksi, $sql);
	$nomor = 1;
	
		echo "<fieldset>";
		echo "<div class='table-responsive'>";
		echo "<table class='table table-responsive-sm table-bordered table-hover' id='desa' border='1' cellpadding='10'>";
		echo "<thead>";
			echo "<tr>";
			echo "<th>No</th>
				<th>Nama Proyek</th>
				<th>Tahun Proyek</th>
				<th>Jumlah Persil</th>
				<th>Luas Persil (M2)</th>
				<th>Edit</th>
				<th>Lihat</th>";	
			echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
	while($data = mysqli_fetch_array($query)){
		?>
			<tr>
				<td><?= $nomor++; ?>.</td>
				<td><?php echo $data['nama_proyek']; ?></td>
				<td><?php echo $data['tahun_proyek']; ?></td>
				<td>x</td>
				<td>x</td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['id_proyek']; ?>&nama_proyek=<?php echo $data['nama_proyek']; ?>&tahun_proyek=<?php echo $data['tahun_proyek']; ?>">Edit</a><!--  |
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a> -->
				</td>
				<td>
					<a href="index.php?aksi=update&id=<?php echo $data['id_proyek']; ?>&nama_proyek=<?php echo $data['nama_proyek']; ?>&tahun_proyek=<?php echo $data['tahun_proyek']; ?>">Lihat</a><!--  |
					<a href="index.php?aksi=delete&id=<?php echo $data['id']; ?>">Hapus</a> -->
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
		$id_proyek = $_POST['id_proyek'];
		$nama_proyek = $_POST['nama_proyek'];
		$tahun_proyek = $_POST['tahun_proyek'];

		
		if(!empty($nama_proyek) && !empty($tahun_proyek)){
			$sql_update = "UPDATE proyek SET nama_proyek='$nama_proyek', tahun_proyek='$tahun_proyek' WHERE id_proyek=$id_proyek";
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
								<input type="hidden" name="id_proyek" value="<?php echo $_GET['id'] ?>"/>
							</td>
						</tr>
						<tr>
							<td>Nama Proyek </td>
							<td> : <input type="text" name="nama_proyek" value="<?php echo $_GET['nama_proyek'] ?>" required /></td>
						</tr>
						<tr>
							<td>Tahun Proyek </td> 
							<td> : <input type="number" name="tahun_proyek" value="<?php echo $_GET['tahun_proyek'] ?>" required /></label></td>
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


<?php include_once('../_footer.php'); ?>
<script type="text/javascript" charset="utf8">
            $(document).ready( function () {
                $('#desa').DataTable(
                    {
                        "pageLength": 4,
                        responsive: true,
                        select: true
                    }
                    );
            } );
        </script>
