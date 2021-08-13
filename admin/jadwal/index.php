<?php
require '../../config/config.php';
require '../../config/koneksi.php';
require '../../config/day.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates/sidebar.php';
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
                                <div class="card-header">
                                    <a href="tambah" class="btn bg-blue"><i class="fa fa-plus-circle"> Tambah Data</i></a>
                                    <a href="#" data-toggle="modal" data-target="#modal_print"  class="btn bg-info"><i class="fa fa-print"> Cetak</i></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                    ?>
                                        <div class="alert alert-info alertinfo" role="alert">
                                            <i class="fa fa-check-circle"> <?= $_SESSION['pesan']; ?></i>
                                        </div>
                                    <?php
                                        $_SESSION['pesan'] = '';
                                    }
                                    ?>

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-black">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Perangkat</th>
                                                    <th>Jadwal</th>
                                                    <th>Opsi</th>
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
                                                                </b>
                                                            </ul>
                                                        </td>
                                                        <td align="center">
                                                            <a href="edit?id=<?= $row['id_jadwal'] ?>" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-clock"> Ubah Jadwal</i></a>
                                                            <a href="hapus?id=<?= $row['id_jadwal'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"> Hapus Jadwal</i></a>
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

        <?php include_once "../../templates/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates/script.php"; ?>

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



 <!-- MODAL Print -->
 <div id="modal_print" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="print" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Pilih Range Tanggal </label>
                                            <div class="col-sm-5">
                                            <input type="date" name="tglmulai" class="form-control">
                                                              <br>s/d<br>
                                             <input type="date" name="tglselesai" class="form-control">
                                            </div>
                                        </div>

                                        <input type="submit" name="print" class="btn btn-success" value="Print">

                                </form>
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>