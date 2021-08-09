<?php $title = "Entri Data Kuasa";
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
                        <p>Entri Data Kuasa Nomor Berkas :</p>
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
        $nik_kuasa = $_POST['nik_kuasa'];
        $id_jk = $_POST['id_jk'];
        $nm_kuasa = $_POST['nm_kuasa'];
        $temp_lahir_kuasa = $_POST['temp_lahir_kuasa'];
        $desa_kuasa = $_POST['desa_kuasa'];
        $tgl_lahir_kuasa = $_POST['tgl_lahir_kuasa'];
        $kecamatan_kuasa = $_POST['kecamatan_kuasa'];
        $pekerjaan_kuasa = $_POST['pekerjaan_kuasa'];
        $kabupaten_kuasa = $_POST['kabupaten_kuasa'];
        $agama_kuasa = $_POST['agama_kuasa'];

        
        if(!empty($nik_kuasa) && !empty($id_jk) && !empty($nm_kuasa) && !empty($temp_lahir_kuasa)){

            $sql ="INSERT INTO kuasa
            (nik_kuasa,id_jk,nama_kuasa,temp_lahir_kuasa,desa_kuasa,tgl_lahir_kuasa,kecamatan_kuasa,pekerjaan_kuasa,kabupaten_kuasa,agama_kuasa)
            VALUES('$nik_kuasa','$id_jk','$nm_kuasa','$temp_lahir_kuasa','$desa_kuasa','$tgl_lahir_kuasa','$kecamatan_kuasa','$pekerjaan_kuasa','$kabupaten_kuasa','$agama_kuasa')";

            $simpan = mysqli_query($koneksi, $sql);
            if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'create'){
                    echo "<meta http-equiv='refresh' content='1;url=entri_kuasa.php'>";
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
                                        <td> : <input type="number" name="nik_kuasa" required /></td>
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
                                        <td>Nama Kuasa </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="nm_kuasa" required /></td>
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
                                        <td> : <input type="text" name="temp_lahir_kuasa" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Desa </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="desa_kuasa" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Tanggal Lahir </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="date" name="tgl_lahir_kuasa" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Kecamatan </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="kecamatan_kuasa" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="col-md-3">
                                        <td>Pekerjaan </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="rext" name="pekerjaan_kuasa" required /></td>
                                    </div>      
                                    <div class="col-md-3">
                                        <td>Kabupaten </td>
                                    </div>
                                    <div class="col-md-3">
                                        <td> : <input type="text" name="kabupaten_kuasa" required /></td>
                                    </div>
                                </tr>
                                <tr>
                                    <td>Agama </td> 
                                    <td> : <input type="text" name="agama_kuasa" required/></td>
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
    $sql = "SELECT * FROM kuasa LEFT JOIN jenis_kelamin ON kuasa.id_jk = jenis_kelamin.id_jk";
    $query = mysqli_query($koneksi, $sql);
    $nomor = 1;
    
        echo "<fieldset>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-responsive-sm table-bordered table-hover' id='user' border='1' cellpadding='10'>";
        echo "<thead>";
            echo "<tr>";
            echo "<th>No</th>
                <th>Nama Kuasa</th>
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
                <td><?php echo $data['nama_kuasa']; ?></td>
                <td><?php echo $data['nik_kuasa']; ?></td>
                <td><?php echo $data['desa_kuasa']; ?></td>
                <td><?php echo $data['kecamatan_kuasa']; ?></td>
                <td><?php echo $data['kabupaten_kuasa']; ?></td>
                <td>
                    <a href="entri_kuasa.php?aksi=update&id=<?php echo $data['id_kuasa']; ?>&nik=<?php echo $data['nik_kuasa']; ?>&jk=<?php echo $data['id_jk']; ?>&nm_kuasa=<?php echo $data['nama_kuasa']; ?>&temp_lahir_kuasa=<?php echo $data['temp_lahir_kuasa']; ?>&desa_kuasa=<?php echo $data['desa_kuasa']; ?>&tgl_lahir_kuasa=<?php echo $data['tgl_lahir_kuasa']; ?>&kecamatan_kuasa=<?php echo $data['kecamatan_kuasa']; ?>&pekerjaan_kuasa=<?php echo $data['pekerjaan_kuasa']; ?>&kabupaten_kuasa=<?php echo $data['kabupaten_kuasa']; ?>&agama_kuasa=<?php echo $data['agama_kuasa']; ?>">Edit</a>
                </td>
                <td>
                    <a href="entri_kuasa.php?aksi=delete&id=<?php echo $data['id_kuasa']; ?>" onClick="return confirm('Yakin akan menghapus kuasa <?= $data['nama_kuasa']; ?>?')">Hapus</a>
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
        $id_kuasa = $_POST['id_kuasa'];
        $nik_kuasa = $_POST['nik_kuasa'];
        $id_jk = $_POST['id_jk'];
        $nm_kuasa = $_POST['nm_kuasa'];
        $temp_lahir_kuasa = $_POST['temp_lahir_kuasa'];
        $desa_kuasa = $_POST['desa_kuasa'];
        $tgl_lahir_kuasa = $_POST['tgl_lahir_kuasa'];
        $kecamatan_kuasa = $_POST['kecamatan_kuasa'];
        $pekerjaan_kuasa = $_POST['pekerjaan_kuasa'];
        $kabupaten_kuasa = $_POST['kabupaten_kuasa'];
        $agama_kuasa = $_POST['agama_kuasa'];

        
        if(!empty($nik) && !empty($id_jk) && !empty($nm_kuasa)&& !empty($temp_lahir_kuasa)){
            $sql_update = "UPDATE kuasa SET nik_kuasa='$nik', id_jk='$id_jk',
                nama_kuasa='$nm_kuasa',
                , temp_lahir_kuasa='$temp_lahir_kuasa', desa_kuasa='$desa_kuasa',
                tgl_lahir_kuasa='$tgl_lahir_kuasa', kecamatan_kuasa='$kecamatan_kuasa', pekerjaan_kuasa='$pekerjaan_kuasa',
                 kabupaten_kuasa='$kabupaten_kuasa', agama_kuasa='$agama_kuasa' WHERE id_kuasa=$id_kuasa";
            $update = mysqli_query($koneksi, $sql_update);
            if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'update'){
                    echo "<div class='alert alert-info'>Data Berhasil Diubah</div>";
                    echo "<meta http-equiv='refresh' content='1;url=entri_kuasa.php'>";
                }
            }
        } else {
            $pesan = "Data tidak lengkap!";
        }
    }
    
    // tampilkan form ubah
    if(isset($_GET['id'])){

        ?>
            <a href="entri_kuasa.php"> &laquo; Home</a> | 
            <a href="entri_kuasa.php?aksi=create"> (+) Tambah Data</a>
            <hr>
            <h3>Ubah Data</h3>
            <form action="" method="POST">
            <fieldset>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-hover" border="0">
                        <tr>
                            <td>    
                                <input type="hidden" name="id_kuasa" value="<?php echo $_GET['id'] ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>NIK </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="number" name="nik_kuasa" value="<?php echo $_GET['nik_kuasa'] ?>" required /></td>
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
                                            $sql = "SELECT * FROM kuasa WHERE id_kuasa='$_GET[id]'";
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
                                <td>Nama Kuasa </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="nm_kuasa" value="<?php echo $_GET['nm_kuasa'] ?>" required /></td>
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
                                <td> : <input type="text" name="temp_lahir_kuasa" value="<?php echo $_GET['temp_lahir_kuasa'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Desa </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="desa_kuasa" value="<?php echo $_GET['desa_kuasa'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Tanggal Lahir </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="date" name="tgl_lahir_kuasa" value="<?php echo $_GET['tgl_lahir_kuasa'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Kecamatan </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="kecamatan_kuasa" value="<?php echo $_GET['kecamatan_kuasa'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <div class="col-md-3">
                                <td>Pekerjaan </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="rext" name="pekerjaan_kuasa" value="<?php echo $_GET['pekerjaan_kuasa'] ?>" required /></td>
                            </div>      
                            <div class="col-md-3">
                                <td>Kabupaten </td>
                            </div>
                            <div class="col-md-3">
                                <td> : <input type="text" name="kabupaten_kuasa" value="<?php echo $_GET['kabupaten_kuasa'] ?>" required /></td>
                            </div>
                        </tr>
                        <tr>
                            <td>Agama </td> 
                            <td> : <input type="text" name="agama_kuasa" value="<?php echo $_GET['agama_kuasa'] ?>" required/></td>
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
        $sql_hapus = "DELETE FROM kuasa WHERE id_kuasa=" . $id;
        $hapus = mysqli_query($koneksi, $sql_hapus);
        
        if($hapus){
            if($_GET['aksi'] == 'delete'){
                echo "<meta http-equiv='refresh' content='1;url=entri_kuasa.php'>";
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
            echo '<a href="entri_kuasa.php"> &laquo; Home</a>';
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


