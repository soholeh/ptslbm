<?php $title = "Entri Data Persetujuan Keluarga";
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
                        <p>Entri Data Persetujuan Keluarga Nomor Berkas :</p>
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
        $nik_keluarga = $_POST['nik_keluarga'];
        $id_jk = $_POST['id_jk'];
        $nama_keluarga = $_POST['nama_keluarga'];
        $temp_lahir_keluarga = $_POST['temp_lahir_keluarga'];
        $desa_keluarga = $_POST['desa_keluarga'];
        $tgl_lahir_keluarga = $_POST['tgl_lahir_keluarga'];
        $kecamatan_keluarga = $_POST['kecamatan_keluarga'];
        $pekerjaan_keluarga = $_POST['pekerjaan_keluarga'];
        $kabupaten_keluarga = $_POST['kabupaten_keluarga'];
        $agama_keluarga = $_POST['agama_keluarga'];

        
        if(!empty($nik_keluarga) && !empty($id_jk) && !empty($nama_keluarga) && !empty($temp_lahir_keluarga)){

            $sql ="INSERT INTO keluarga
            (nik_keluarga,id_jk,nama_keluarga,temp_lahir_keluarga,desa_keluarga,tgl_lahir_keluarga,kecamatan_keluarga,pekerjaan_keluarga,kabupaten_keluarga,agama_keluarga)
            VALUES('$nik_keluarga','$id_jk','$nama_keluarga','$temp_lahir_keluarga','$desa_keluarga','$tgl_lahir_keluarga','$kecamatan_keluarga','$pekerjaan_keluarga','$kabupaten_keluarga','$agama_keluarga')";

            $simpan = mysqli_query($koneksi, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    echo "<meta http-equiv='refresh' content='1;url=entri_persetujuan_keluarga.php'>";
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
                                        <td> : <input type="number" name="nik_keluarga" required /></td>
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
                                        <td>Nama </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="nama_keluarga" required /></td>
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
                                        <td> : <input type="text" name="temp_lahir_keluarga" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Desa </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="desa_keluarga" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Tanggal Lahir </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="date" name="tgl_lahir_keluarga" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Kecamatan </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="kecamatan_keluarga" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Pekerjaan </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="rext" name="pekerjaan_keluarga" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Kabupaten </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="kabupaten_keluarga" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <td>Agama </td> 
                                    <td> : <input type="text" name="agama_keluarga" required/></td>
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
    $sql = "SELECT * FROM keluarga LEFT JOIN jenis_kelamin ON keluarga.id_jk = jenis_kelamin.id_jk";
    $query = mysqli_query($koneksi, $sql);
    $nomor = 1;
    
        echo "<fieldset>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
        echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>
                <th>Nama</th>
                <th>NIK</th>
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
                <td><?php echo $data['nama_keluarga']; ?></td>
                <td><?php echo $data['nik_keluarga']; ?></td>
                <td><?php echo $data['desa_keluarga']; ?></td>
                <td><?php echo $data['kecamatan_keluarga']; ?></td>
                <td><?php echo $data['kabupaten_keluarga']; ?></td>
                <td>
                    <a href="entri_persetujuan_keluarga.php?aksi=update&id=<?php echo $data['id_keluarga']; ?>&nik_keluarga=<?php echo $data['nik_keluarga']; ?>&jk=<?php echo $data['id_jk']; ?>&nama_keluarga=<?php echo $data['nama_keluarga']; ?>&temp_lahir_keluarga=<?php echo $data['temp_lahir_keluarga']; ?>&desa_keluarga=<?php echo $data['desa_keluarga']; ?>&tgl_lahir_keluarga=<?php echo $data['tgl_lahir_keluarga']; ?>&kecamatan_keluarga=<?php echo $data['kecamatan_keluarga']; ?>&pekerjaan_keluarga=<?php echo $data['pekerjaan_keluarga']; ?>&kabupaten_keluarga=<?php echo $data['kabupaten_keluarga']; ?>&agama_keluarga=<?php echo $data['agama_keluarga']; ?>">Edit</a>
                </td>
                <td>
                    <a href="entri_persetujuan_keluarga.php?aksi=delete&id=<?php echo $data['id_keluarga']; ?>" onClick="return confirm('Yakin akan menghapus keluarga <?= $data['nama_keluarga']; ?>?')">Hapus</a>
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
        $id_keluarga = $_POST['id_keluarga'];
        $nik_keluarga = $_POST['nik_keluarga'];
        $id_jk = $_POST['id_jk'];
        $nama_keluarga = $_POST['nama_keluarga'];
        $temp_lahir_keluarga = $_POST['temp_lahir_keluarga'];
        $desa_keluarga = $_POST['desa_keluarga'];
        $tgl_lahir_keluarga = $_POST['tgl_lahir_keluarga'];
        $kecamatan_keluarga = $_POST['kecamatan_keluarga'];
        $pekerjaan_keluarga = $_POST['pekerjaan_keluarga'];
        $kabupaten_keluarga = $_POST['kabupaten_keluarga'];
        $agama_keluarga = $_POST['agama_keluarga'];

        
        if(!empty($nik_keluarga) && !empty($id_jk) && !empty($nama_keluarga) && !empty($temp_lahir_keluarga)){
            $sql_update = "UPDATE keluarga SET nik_keluarga='$nik_keluarga', id_jk='$id_jk',
                nama_keluarga='$nama_keluarga',
                temp_lahir_keluarga='$temp_lahir_keluarga', desa_keluarga='$desa_keluarga',
                tgl_lahir_keluarga='$tgl_lahir_keluarga', kecamatan_keluarga='$kecamatan_keluarga', pekerjaan_keluarga='$pekerjaan_keluarga', 
                kabupaten_keluarga='$kabupaten_keluarga', agama_keluarga='$agama_keluarga' WHERE id_keluarga=$id_keluarga";
            $update = mysqli_query($koneksi, $sql_update);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
                    echo "<meta http-equiv='refresh' content='1;url=entri_persetujuan_keluarga.php'>";
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    
    // tampilkan form ubah
    if(isset($_GET['id'])){

        ?>
            <a href="entri_persetujuan_keluarga.php"> &laquo; Home</a> | 
            <a href="entri_persetujuan_keluarga.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            <h3>Ubah Data</h3>
            <form action="" method="POST">
            <fieldset>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-hover" border="0">
                        <tr>
                            <td>    
                                <input type="hidden" name="id_keluarga" value="<?php echo $_GET['id'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>NIK </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="number" name="nik_keluarga" value="<?php echo $_GET['nik'] ?>" required /></td>
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
                                            $sql = "SELECT * FROM keluarga WHERE id_keluarga='$_GET[id]'";
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
                                <td>Nama Keluarga </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="nama_keluarga" value="<?php echo $_GET['nama_keluarga'] ?>" required /></td>
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
                                <td> : <input type="text" name="temp_lahir_keluarga" value="<?php echo $_GET['temp_lahir_keluarga'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Desa </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="desa_keluarga" value="<?php echo $_GET['desa_keluarga'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Tanggal Lahir </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="date" name="tgl_lahir_keluarga" value="<?php echo $_GET['tgl_lahir_keluarga'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Kecamatan </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="kecamatan_keluarga" value="<?php echo $_GET['kecamatan_keluarga'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Pekerjaan </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="rext" name="pekerjaan_keluarga" value="<?php echo $_GET['pekerjaan_keluarga'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Kabupaten </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="kabupaten_keluarga" value="<?php echo $_GET['kabupaten_keluarga'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <td>Agama </td> 
                            <td> : <input type="text" name="agama_keluarga" value="<?php echo $_GET['agama_keluarga'] ?>" required/></td>
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
        $sql_hapus = "DELETE FROM keluarga WHERE id_keluarga=" . $id;
        $hapus = mysqli_query($koneksi, $sql_hapus);
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                echo "<meta http-equiv='refresh' content='1;url=entri_persetujuan_keluarga.php'>";
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
            echo '<a href="entri_persetujuan_keluarga.php"> &laquo; Home</a>';
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


