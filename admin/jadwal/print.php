<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;
$tglmulai   = $_POST['tglmulai'];
$tglselesai = $_POST['tglselesai'];
$data = $koneksi->query("SELECT * FROM jadwal AS j 
LEFT JOIN halte AS h ON j.id_halte = h.id_halte
LEFT JOIN bus AS b ON j.id_bus = b.id_bus
LEFT JOIN supir AS s ON j.id_supir = s.id_supir
LEFT JOIN kernet AS k ON j.id_kernet = k.id_kernet
WHERE (tanggal_jadwal BETWEEN '$tglmulai' AND '$tglselesai') ORDER BY tanggal_jadwal ASC");

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
            <font size="5">Laporan Jadwal</font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Perangkat</th>
                        <th>Jadwal</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_array($data)) { ?>
                            <tr>
                                <td align="center"><?= $no++ ?></td>
                                <td>
                                    <ul>
                                        <li>Plat Nomor Bus <?= ": ".$row['plat_nomor'] ?></li>
                                        <li>Nama Supir <?= ": ".$row['nama_supir'] ?></li>
                                        <li>Nama Kernet <?= ": ".$row['nama_kernet'] ?></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <b>
                                        <li>Nama Halte <?= ": ".$row['nama_halte'] ?></li>
                                        <li>Tanggal <?= ": ".$row['tanggal_jadwal'] ?></li>
                                        <li>Jam <?= ": ".$row['jam'] ?></li>
                                        </b>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    <br>

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