<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;

    $status_bus   = $_POST['status_bus'];

  $bln = array(
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember'
        );

 ?>

 <script type="text/javascript">
 	window.print();
 </script>

<!DOCTYPE html>
<html>
<head>
  <title>LAPORAN DATA BUS</title>
</head>
<body>

    
    <h3><center><br>
      LAPORAN DATA BUS<br> 
    </center></h3><br><br>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                            <thead class="bg-black">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Kode Bus</th>
                                                    <th>Merk Bus</th>
                                                    <th>Plat Nomor</th>
                                                    <th>Kapasitas</th>
                                                    <th>Status Bus</th>
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: azure">
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM bus WHERE status_bus = '$status_bus'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td><?= $row['kd_bus'] ?></td>
                                                        <td><?= $row['merk_bus'] ?></td>
                                                        <td><?= $row['plat_nomor'] ?></td>
                                                        <td><?= $row['kapasitas'] ?></td>
                                                        <td><?= $row['status_bus'] ?></td>
                                                    </tr>
                                                    <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<!-- <label>Jumlah Pegawai : <?php echo "<b>".$jumlah.' Pegawai'."</b>"; ?></label> -->
<br>

<br>
</div> 


</body>
</html>