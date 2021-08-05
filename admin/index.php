<?php
require '../config/config.php';
require '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../templates/head.php';
?>

<style>
  #mapid { 
    height: 580px; 
    width: 100%;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include '../templates/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include '../templates/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

          <div class="alert alert-warning" role="alert">
            <h5><b>
                <i class="fa fa-info-circle"></i>
                "POINT MARKER HALTE BUS BERBASIS WEBGIS PADA PEMKO BANJARMASIN "
              </b></h5>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <center>
                  <div id="mapid">
                  </div>
                  </center>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <?php
    include '../templates/footer.php';
    ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Script -->
  <?php
  include '../templates/script.php';
  ?>
</body>

</html>
<?php 
  $data = $koneksi->query("SELECT * FROM halte");
  foreach ($data as $key) {
    $marker[] = $key;
  }
  $json = json_encode($marker);


?>


<script>
  var mymap = L.map('mapid').setView([-3.316694 , 114.590111], 13);

  L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 100,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(mymap);

    var data = JSON.parse( '<?php echo $json ?>' );
    data.forEach(function(item){

    // console.log(item);
    var marker = L.marker([item.lat, item.lng]).addTo(mymap);
    
    })
    
</script>