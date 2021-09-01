<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM jadwal WHERE id_jadwal = '$id'");
$row  = $data->fetch_array();
$json = json_encode($row);


?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
?>
<style>
  #mapid { 
    height: 400px; 
    width: 100%;
    }
</style>
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
                                <li class="breadcrumb-item active">Edit Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">Jadwal</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                 
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tanggal_jadwal" name="tanggal_jadwal" value="<?= $row['tanggal_jadwal'] ?>">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Jam</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jam" name="jam" value="<?= $row['jam'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nama_kernet" class="col-sm-2 col-form-label">Halte</label>
                                            <div class="col-sm-10">
                                            <select class="custom-select select2 mb-0 col-sm-10" name="id_halte" data-placeholder="Pilih" required>
                                                <option value=""></option>
                                                <?php
                                                $data = $koneksi->query("SELECT * FROM halte");
                                                foreach ($data as $d) {
                                                ?>
                                                    <option value="<?= $d['id_halte'] ?>" <?php if ($d['id_halte'] == $row['id_halte']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $d['nama_halte'] ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_kernet" class="col-sm-2 col-form-label">Bus</label>
                                            <div class="col-sm-10">
                                            <select class="custom-select select2 mb-0 col-sm-10" name="id_bus" data-placeholder="Pilih" required>
                                                <option value=""></option>
                                                <?php
                                                $data = $koneksi->query("SELECT * FROM bus WHERE status_bus = 'Aktif'");
                                                foreach ($data as $d) {
                                                ?>
                                                    <option value="<?= $d['id_bus'] ?>" <?php if ($d['id_bus'] == $row['id_bus']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $d['plat_nomor'] ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_kernet" class="col-sm-2 col-form-label">Nama Supir</label>
                                            <div class="col-sm-10">
                                            <select class="custom-select select2 mb-0 col-sm-10" name="id_supir" data-placeholder="Pilih" required>
                                                <option value=""></option>
                                                <?php
                                                $data = $koneksi->query("SELECT * FROM supir");
                                                foreach ($data as $d) {
                                                ?>
                                                    <option value="<?= $d['id_supir'] ?>" <?php if ($d['id_supir'] == $row['id_supir']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $d['nama_supir'] ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                   
                                        <div class="form-group row">
                                            <label for="nama_kernet" class="col-sm-2 col-form-label">Nama Kernet</label>
                                            <div class="col-sm-10">
                                            <select class="custom-select select2 mb-0 col-sm-10" name="id_kernet" data-placeholder="Pilih" required>
                                                <option value=""></option>
                                                <?php
                                                $data = $koneksi->query("SELECT * FROM kernet");
                                                foreach ($data as $d) {
                                                ?>
                                                    <option value="<?= $d['id_kernet'] ?>" <?php if ($d['id_kernet'] == $row['id_kernet']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $d['nama_kernet'] ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                        </div>
                                   
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tarif Halte</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tarif_halte" name="tarif_halte" value="<?= $row['tarif_halte'] ?>">
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/kernet/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Simpan</i></button>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>

                            </div>
                            <!--/.col (left) -->
                        </div>

                    </form>

                </div><!-- /.container-fluid -->
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

    <?php

    if (isset($_POST['submit'])) {
        $tanggal_jadwal             = $_POST['tanggal_jadwal'];
        $jam                        = $_POST['jam'];
        $id_halte                   = $_POST['id_halte'];
        $id_bus                     = $_POST['id_bus'];
        $id_supir                   = $_POST['id_supir'];
        $id_kernet                  = $_POST['id_kernet'];
        $tarif_halte                  = $_POST['tarif_halte'];
    

        $submit = $koneksi->query("UPDATE jadwal SET 
        tanggal_jadwal = '$tanggal_jadwal', 
        jam = '$jam',
        id_halte = '$id_halte',
        id_bus = '$id_bus',
        id_supir = '$id_supir',
        id_kernet = '$id_kernet',
        tarif_halte = '$tarif_halte'
        WHERE 
        id_jadwal = '$id'");
        // var_dump($submit, $koneksi->error);
        // die;
        if ($submit) {

            $_SESSION['pesan'] = "Data Jadwal Ditambahkan";
            echo "<script>window.location.replace('../jadwal/');</script>";
        }
    }
    ?>


</body>

</html>



<script>
  var mymap = L.map('mapid').setView([-3.316694 , 114.590111], 14);

  L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 100,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(mymap);


    var data = JSON.parse( '<?php echo $json ?>' );
    

    var marker = L.marker([data.lat, data.lng]).addTo(mymap);
        marker.bindPopup('Lokasi Terakhir').openPopup();
		var updateMarker = function(lat, lng) {
		    marker
                .setLatLng([lat, lng])
                .addTo(mymap)
		        .bindPopup("Your location :  " + marker.getLatLng().toString())
		        .openPopup();
		    return false;
		};

		mymap.on('click', function(e) {
		    $('#latInput').val(e.latlng.lat);
		    $('#longInput').val(e.latlng.lng);
            updateMarker(e.latlng.lat, e.latlng.lng);
        
	    	});
	    	
	    	var updateMarkerByInputs = function() {
			return updateMarker( $('#latInput').val() , $('#langInput').val());
		}
		$('#latInput').on('input', updateMarkerByInputs);
        $('#longInput').on('input', updateMarkerByInputs);



</script>