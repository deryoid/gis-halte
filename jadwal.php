<?php
require 'config/config.php';
require 'config/koneksi.php';
require 'config/day.php';
?>
<!DOCTYPE html>
<html>
<?php
include 'templates_public/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include 'templates_public/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include 'templates_public/sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Jadwal</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Jadwal</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-warning card-outline">
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-black">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Perangkat</th>
                                                    <th>Jadwal</th>
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: azure">
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM jadwal AS j 
                                            LEFT JOIN halte AS h ON j.id_halte = h.id_halte
                                            LEFT JOIN bus AS b ON j.id_bus = b.id_bus
                                            LEFT JOIN supir AS s ON j.id_supir = s.id_supir
                                            LEFT JOIN kernet AS k ON j.id_kernet = k.id_kernet
                                            ");
                                            while ($row = $data->fetch_array()) {
                                            ?>
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
                                                                <li>Tarif <?= ": ".$row['tarif_halte'] ?></li>
                                                                </b>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once "templates_public/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "templates_public/script.php"; ?>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });


    </script>

</body>

</html>