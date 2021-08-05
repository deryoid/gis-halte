<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM halte WHERE id_halte = '$id'");
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
                            <h1 class="m-0 text-dark">Halte</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Halte</li>
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
                                        <h3 class="card-title">Halte</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                      
                                    <div class="form-group row">
                                            <label for="kd_halte" class="col-sm-2 col-form-label">Kode Halte</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"  name="kd_halte" value="<?= $row['kd_halte'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_halte" class="col-sm-2 col-form-label">Nama Halte</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_halte" name="nama_halte" value="<?= $row['nama_halte'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea type="textarea" class="form-control" id="alamat" name="alamat"><?= $row['alamat'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lat" class="col-sm-2 col-form-label">lat</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="latInput" name="lat" value="<?= $row['lat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="long" class="col-sm-2 col-form-label">long</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="longInput" name="lng" value="<?= $row['lng'] ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <center>
                                                    <div id="mapid"></div>
                                                    </center>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/pengajuan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $kd_halte             = $_POST['kd_halte'];
        $nama_halte           = $_POST['nama_halte'];
        $alamat               = $_POST['alamat'];
        $lat                  = $_POST['lat'];
        $lng                  = $_POST['lng'];
    

        $submit = $koneksi->query("UPDATE halte SET 
        kd_halte = '$kd_halte', 
        nama_halte = '$nama_halte',
        alamat = '$alamat',
        lat = '$lat',
        lng = '$lng'
        WHERE 
        id_halte = '$id'");
        // var_dump($submit, $koneksi->error);
        // die;
        if ($submit) {

            $_SESSION['pesan'] = "Data Halte Ditambahkan";
            echo "<script>window.location.replace('../halte/');</script>";
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