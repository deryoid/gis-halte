<aside class="main-sidebar sidebar-light-green elevation-2">
  <!-- dark-primary  -->
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/assets/dist/img/bus-halte.png" style="width: 40px;" alt="#" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"><b style="font-size : 14px;">Point Maker Halte Bus</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 d-flex">
      <!-- <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> -->
      <div class="info">
        <a href="#" class="d-block">
          <i>
           Masyarakat
          </i>
        </a>
      </div>
    </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('index') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= base_url('jadwal') ?>" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Jadwal Halte
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->


  </div>
  <!-- /.sidebar -->
</aside>