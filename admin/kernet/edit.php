<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM kernet WHERE id_kernet = '$id'");
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
                            <h1 class="m-0 text-dark">Kernet</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Kernet</li>
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
                                        <h3 class="card-title">Kernet</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                 
                                        <div class="form-group row">
                                            <label for="nama_kernet" class="col-sm-2 col-form-label">Nama Kernet</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"  name="nama_kernet" value="<?= $row['nama_kernet'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_telp" class="col-sm-2 col-form-label">Nomor Telp</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="no_telp" name="no_telp" value="<?= $row['no_telp'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                            <textarea type="textarea" class="form-control" id="alamat" name="alamat"><?= $row['alamat'] ?></textarea>
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
        $nama_kernet             = $_POST['nama_kernet'];
        $no_telp           = $_POST['no_telp'];
        $alamat               = $_POST['alamat'];
    

        $submit = $koneksi->query("UPDATE kernet SET 
        nama_kernet = '$nama_kernet', 
        no_telp = '$no_telp',
        alamat = '$alamat'
        WHERE 
        id_kernet = '$id'");
        // var_dump($submit, $koneksi->error);
        // die;
        if ($submit) {

            $_SESSION['pesan'] = "Data Kernet Ditambahkan";
            echo "<script>window.location.replace('../kernet/');</script>";
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