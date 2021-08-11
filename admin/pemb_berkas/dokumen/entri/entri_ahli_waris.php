<?php $title = "Entri Data Ahli Waris";
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
                        <p>Entri Data Ahli Waris Nomor Berkas :</p>
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
        $nik_ahli_waris = $_POST['nik_ahli_waris'];
        $id_jk = $_POST['id_jk'];
        $nama_ahli_waris = $_POST['nama_ahli_waris'];
        $temp_lahir_ahli_waris = $_POST['temp_lahir_ahli_waris'];
        $desa_ahli_waris = $_POST['desa_ahli_waris'];
        $tgl_lahir_ahli_waris = $_POST['tgl_lahir_ahli_waris'];
        $kecamatan_ahli_waris = $_POST['kecamatan_ahli_waris'];
        $pekerjaan_ahli_waris = $_POST['pekerjaan_ahli_waris'];
        $kabupaten_ahli_waris = $_POST['kabupaten_ahli_waris'];
        $agama_ahli_waris = $_POST['agama_ahli_waris'];

        
        if(!empty($nik_ahli_waris) && !empty($id_jk) && !empty($nama_ahli_waris) && !empty($temp_lahir_ahli_waris)){

            $sql ="INSERT INTO ahli_waris
            (nik_ahli_waris,id_jk,nama_ahli_waris,temp_lahir_ahli_waris,desa_ahli_waris,tgl_lahir_ahli_waris,kecamatan_ahli_waris,pekerjaan_ahli_waris,kabupaten_ahli_waris,agama_ahli_waris)
            VALUES('$nik_ahli_waris','$id_jk','$nama_ahli_waris','$temp_lahir_ahli_waris','$desa_ahli_waris','$tgl_lahir_ahli_waris','$kecamatan_ahli_waris','$pekerjaan_ahli_waris','$kabupaten_ahli_waris','$agama_ahli_waris')";

            $simpan = mysqli_query($koneksi, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    echo "<meta http-equiv='refresh' content='1;url=entri_ahli_waris.php'>";
                }
            }
        } else {
            $pesan = "Tidak dapat menyimpan, data belum lengkap!";
        }
    }

    ?> 
    <dir class="row">
        <div class="col-xl-12">
        <form action="" method="POST">
            <div class="form-row">
                    <fieldset>
                        <div class="table-responsive">
                            <table class="table table-responsive-sm table-hover" border="0">
                                <tr>
                                    <div class="col-md-3">
                                        <td>NIK </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="number" name="nik_ahli_waris" required /></td>
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
                                                ?>
                                                <option disabled selected value="">-Pilih Jenis Kelamin-</option>
                                                <?php foreach ($datajenis_kelamin as $key => $value):?>
                                                <option value="<?= $value["id_jk"] ?>"><?= $value["nama_jk"] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </div>      
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Nama Ahli Waris </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="nama_ahli_waris" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Alamat </td>
                                    </div>     
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Tempat Lahir </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="temp_lahir_ahli_waris" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Desa </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="desa_ahli_waris" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Tanggal Lahir </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="date" name="tgl_lahir_ahli_waris" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Kecamatan </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="kecamatan_ahli_waris" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Pekerjaan </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="rext" name="pekerjaan_ahli_waris" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Kabupaten </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="kabupaten_ahli_waris" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <td>Agama </td> 
                                    <td> : <input type="text" name="agama_ahli_waris" required/></td>
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
    $sql = "SELECT *, (Select YEAR(curdate()) - YEAR(tgl_lahir_ahli_waris)) AS usia FROM ahli_waris LEFT JOIN jenis_kelamin ON ahli_waris.id_jk = jenis_kelamin.id_jk";
    $query = mysqli_query($koneksi, $sql);
    $nomor = 1;
    
        echo "<fieldset>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
        echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>
                <th>Nama Ahli_waris</th>
                <th>NIK</th>
                <th>Umur</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>Edit</th>
                <th>Hapus</th>";    
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    while($data = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?= $nomor++; ?>.</td>
                <td><?php echo $data['nama_ahli_waris']; ?></td>
                <td><?php echo $data['nik_ahli_waris']; ?></td>
                <td><?php echo $data['usia']; ?></td>
                <td><?php echo $data['desa_ahli_waris']; ?></td>
                <td><?php echo $data['kecamatan_ahli_waris']; ?></td>
                <td><?php echo $data['kabupaten_ahli_waris']; ?></td>
                <td>
                    <a href="entri_ahli_waris.php?aksi=update&id=<?php echo $data['id_ahli_waris']; ?>
                    &nik_ahli_waris=<?php echo $data['nik_ahli_waris']; ?>&jk=<?php echo $data['id_jk']; ?>
                    &nama_ahli_waris=<?php echo $data['nama_ahli_waris']; ?>&temp_lahir_ahli_waris=<?php echo $data['temp_lahir_ahli_waris']; ?>
                    &desa_ahli_waris=<?php echo $data['desa_ahli_waris']; ?>&tgl_lahir_ahli_waris=<?php echo $data['tgl_lahir_ahli_waris']; ?>
                    &kecamatan_ahli_waris=<?php echo $data['kecamatan_ahli_waris']; ?>&pekerjaan_ahli_waris=<?php echo $data['pekerjaan_ahli_waris']; ?>
                    &kabupaten_ahli_waris=<?php echo $data['kabupaten_ahli_waris']; ?>&agama_ahli_waris=<?php echo $data['agama_ahli_waris']; ?>">Edit</a>
                </td>
                <td>
                    <a href="entri_ahli_waris.php?aksi=delete&id=<?php echo $data['id_ahli_waris']; ?>" onClick="return confirm('Yakin akan menghapus ahli_waris <?= $data['nama_ahli_waris']; ?>?')">Hapus</a>
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
        $id_ahli_waris = $_POST['id_ahli_waris'];
        $nik_ahli_waris = $_POST['nik_ahli_waris'];
        $id_jk = $_POST['id_jk'];
        $nama_ahli_waris = $_POST['nama_ahli_waris'];
        $temp_lahir_ahli_waris = $_POST['temp_lahir_ahli_waris'];
        $desa_ahli_waris = $_POST['desa_ahli_waris'];
        $tgl_lahir_ahli_waris = $_POST['tgl_lahir_ahli_waris'];
        $kecamatan_ahli_waris = $_POST['kecamatan_ahli_waris'];
        $pekerjaan_ahli_waris = $_POST['pekerjaan_ahli_waris'];
        $kabupaten_ahli_waris = $_POST['kabupaten_ahli_waris'];
        $agama_ahli_waris = $_POST['agama_ahli_waris'];

        
        if(!empty($nik_ahli_waris) && !empty($id_jk) && !empty($nama_ahli_waris) && !empty($temp_lahir_ahli_waris)){
            $sql_update = "UPDATE ahli_waris SET nik_ahli_waris='$nik_ahli_waris', id_jk='$id_jk',
                nama_ahli_waris='$nama_ahli_waris',
                temp_lahir_ahli_waris='$temp_lahir_ahli_waris', desa_ahli_waris='$desa_ahli_waris',
                tgl_lahir_ahli_waris='$tgl_lahir_ahli_waris', kecamatan_ahli_waris='$kecamatan_ahli_waris', pekerjaan_ahli_waris='$pekerjaan_ahli_waris',
                 kabupaten_ahli_waris='$kabupaten_ahli_waris', agama_ahli_waris='$agama_ahli_waris' WHERE id_ahli_waris=$id_ahli_waris";
            $update = mysqli_query($koneksi, $sql_update);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
                    echo "<meta http-equiv='refresh' content='1;url=entri_ahli_waris.php'>";
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    
    // tampilkan form ubah
    if(isset($_GET['id'])){

        ?>
            <a href="entri_ahli_waris.php"> &laquo; Home</a> | 
            <a href="entri_ahli_waris.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            <h3>Ubah Data</h3>
            <form action="" method="POST">
            <fieldset>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-hover" border="0">
                        <tr>
                            <td>    
                                <input type="hidden" name="id_ahli_waris" value="<?php echo $_GET['id'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>NIK </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="number" name="nik_ahli_waris" value="<?php echo $_GET['nik_ahli_waris'] ?>" required /></td>
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
                                            $sql = "SELECT * FROM ahli_waris WHERE id_ahli_waris='$_GET[id]'";
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
                                <td>Nama Ahli_waris </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="nama_ahli_waris" value="<?php echo $_GET['nama_ahli_waris'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Alamat </td>
                            </div>
                                  
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Tempat Lahir </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="temp_lahir_ahli_waris" value="<?php echo $_GET['temp_lahir_ahli_waris'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Desa </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="desa_ahli_waris" value="<?php echo $_GET['desa_ahli_waris'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Tanggal Lahir </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="date" name="tgl_lahir_ahli_waris" value="<?php echo $_GET['tgl_lahir_ahli_waris'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Kecamatan </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="kecamatan_ahli_waris" value="<?php echo $_GET['kecamatan_ahli_waris'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Pekerjaan </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="rext" name="pekerjaan_ahli_waris" value="<?php echo $_GET['pekerjaan_ahli_waris'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Kabupaten </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="kabupaten_ahli_waris" value="<?php echo $_GET['kabupaten_ahli_waris'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <td>Agama </td> 
                            <td> : <input type="text" name="agama_ahli_waris" value="<?php echo $_GET['agama_ahli_waris'] ?>" required/></td>
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
//      echo "<pre>";
//      print_r($level);
//      echo "</pre>";
    }
    
}
// --- Tutup Fungsi Update

// --- Fungsi Delete
function hapus($koneksi){

    if(isset($_GET['id']) && isset($_GET['aksi'])){
        $id = $_GET['id'];
        $sql_hapus = "DELETE FROM ahli_waris WHERE id_ahli_waris=" . $id;
        $hapus = mysqli_query($koneksi, $sql_hapus);
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                echo "<meta http-equiv='refresh' content='1;url=entri_ahli_waris.php'>";
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
            echo '<a href="entri_ahli_waris.php"> &laquo; Home</a>';
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
            echo "<h3>Aksi <i>".$_GET['aksi']."</i> tidak ada!</h3>";
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


