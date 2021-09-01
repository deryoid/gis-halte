<?php
require 'config/config.php';
require 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include 'templates_public/head.php';
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
    include 'templates_public/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include 'templates_public/sidebar.php';
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

          <div class="alert alert-info" role="alert">
            <h5><b>
              <marquee behavior="" direction="">
                <i class="fa fa-info-circle"></i>
                "POINT MARKER HALTE BUS BERBASIS WEBGIS PADA PEMKO BANJARMASIN "
                </marquee></b></h5>
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
    include 'templates_public/footer.php';
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
  include 'templates_public/script.php';
  ?>
</body>

</html>
<?php 
  $data = $koneksi->query("SELECT * FROM jadwal AS j 
  LEFT JOIN halte AS h ON j.id_halte = h.id_halte
  LEFT JOIN bus AS b ON j.id_bus = b.id_bus
  LEFT JOIN supir AS s ON j.id_supir = s.id_supir
  LEFT JOIN kernet AS k ON j.id_kernet = k.id_kernet");
  foreach ($data as $key) {
    $marker[] = $key;
  }
  $json = json_encode($marker);


?>


<script>
  var mymap = L.map('mapid').setView([-3.316694 , 114.590111], 14);

  L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 100,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(mymap);

    var myIcon = L.icon({
      iconUrl: '<?= base_url() ?>/assets/dist/img/markerhalte1.png',
      iconSize: [60, 65], // size of the icon
      });
     
    
    var data = JSON.parse( '<?php echo $json ?>' );
    data.forEach(function(item){

    // console.log(item);
    var marker = L.marker([item.lat, item.lng],{icon: myIcon}).addTo(mymap);
    marker.bindPopup("<b><?= $key['nama_halte'] ?></b><br><b>Jadwal: <?= $key['tanggal_jadwal'] ?></b><br><b>Tarif Halte: <?= $key['tarif_halte'] ?></b>").openPopup();
    })
    
</script>