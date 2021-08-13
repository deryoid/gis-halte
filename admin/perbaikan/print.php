<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;


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
    <title>LAPORAN DATA </title>
</head>

<body>
    <p align="center"><b>
            <font size="5">Laporan Bus yang tidak Aktif (Dalam Perbaikan)</font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
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
                                            $data = $koneksi->query("SELECT * FROM bus WHERE status_bus = 'Tidak Aktif'");
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

    </div>

    </div>
    <div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    Pimpinan
  </h5>

</div>

</body>

</html>

<script>
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>