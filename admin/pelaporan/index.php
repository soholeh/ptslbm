<?php $title = "Pelaporan";
include_once('../_header.php');
$semuadata = array();

if (isset($_POST["kirim"])) {
    $nama_pro = $_POST["nama_pro"];
    $tahun_pro = $_POST["tahun_pro"];

    if ($nama_pro != "" || $tahun_pro != "") {
      $sql = mysqli_query($koneksi, "SELECT nama_desa, nama_kecamatan, tahun_proyek, nama_klaster, SUM(luas_pengukuran) AS lp 
        FROM desa 
         JOIN kecamatan 
        ON desa.id_kecamatan = kecamatan.id_kecamatan 
         JOIN user
        ON desa.id_desa = user.id_desa
         JOIN pengukuran
        ON user.id_user = pengukuran.id_user
         JOIN klaster
        ON pengukuran.id_klaster = klaster.id_klaster
         JOIN proyek
        ON user.id_proyek = proyek.id_proyek
        WHERE nama_proyek = '$nama_pro'
        OR tahun_proyek = '$tahun_pro'
        GROUP BY nama_desa") or die('error');
      $jumlah_pencarian = mysqli_num_rows($sql);    
    if (mysqli_num_rows($sql) > 0) {
      while($row = mysqli_fetch_assoc($sql))
      {
          $semuadata[]=$row;
      }
    } else{
      echo    "<script>
                alert('Data tidak valid');
                location='index.php';
            </script>";
    }
    }

    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
}
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
                   <h3> Pelaporan</h3>
                </li>
            </ol>

            <div class="row">

              <div class="col-xl-10 offset-xl-1">

                <form action="" method="POST">
                  <fieldset>
                    <div class="table-responsive">
                      <table class="table table-responsive-sm table-hover" border="0">
                        <tr>
                          <td>Nama Proyek </td> 
                          <td> : <input type="text" name="nama_pro" autofocus /></td>
                        </tr>
                        <tr>
                          <td>Tahun Proyek</td> 
                          <td> : <input type="text" name="tahun_pro" /></label></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><label class="ml-2">
                          <input type="submit" name="kirim" value="Cari"/>
                          <!-- <input type="reset" name="reset" value="Besihkan"/> -->
                        </label></td>
                        </tr>

                      </table>
                      <br>
                    </div>

                    <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                  </fieldset>
                </form>
                    <p class='text-center'>Pendaftaran Tanah Sistematis Lengkap (PTSL)</p>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm table-bordered" id="tabel_per_menu">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Desa</th>
                                                <th>Kecamatan</th>
                                                <th>Tahun</th>
                                                <th>K1</th>
                                                <th>K2</th>
                                                <th>K3</th>
                                                <th>K4</th>
                                                <th>Total Persil</th>
                                                <th>Luas Persil M2</th>
                                            </tr>
                                        </thead>
                                        <?php if (isset($_POST["kirim"])): ?> 
                                        <tbody>
                                            <?php foreach ($semuadata as $key => $value):?>
                                            <tr>
                                                <td><?= $key+1;?></td>
                                                <td><?= $value["nama_desa"];?></td>
                                                <td><?= $value["nama_kecamatan"];?></td>
                                                <td><?= $value["tahun_proyek"];?></td>
                                                <td><?= $value["nama_klaster"];?></td>
                                                <td><?= $value["nama_klaster"];?></td>
                                                <td><?= $value["nama_klaster"];?></td>
                                                <td><?= $value["nama_klaster"];?></td>
                                                <td><?= $value["nama_klaster"];?></td>
                                                <td><?= $value["lp"];?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <?php endif ?>
                                        <tfoot>
                                            <th class='text-center' colspan='4'>Total</th>
                                            <th class='text-center'></th>
                                            <th class='text-center'></th>
                                            <th class='text-center'></th>
                                            <th class='text-center'></th>
                                            <th class='text-center'></th>
                                            <th class='text-center'></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
    </main>


<?php include_once('../_footer.php'); ?>

