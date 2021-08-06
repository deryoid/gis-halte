<aside class="main-sidebar sidebar-dark-blue elevation-4">
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
            <?php
            if ($_SESSION['role'] == "Super Admin") {
              echo $_SESSION['nama'];
            } elseif ($_SESSION['role'] == "Teknisi") {
              echo $_SESSION['nama'];
            } elseif ($_SESSION['role'] == "User") {
              echo $_SESSION['nama'];
            } 
            ?>
          </i>
        </a>
      </div>
    </div>




    <?php if ($_SESSION['role'] == "Super Admin") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Data Pengguna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/user/') ?>" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Manajemen Pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header">Menu</li>

          <li class="nav-item">
            <a href="<?= base_url('admin/halte') ?>" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
                Halte
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/bus') ?>" class="nav-link">
              <i class="nav-icon fas fa-bus"></i>
              <p>
                Bus
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/supir') ?>" class="nav-link">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Supir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/kernet') ?>" class="nav-link">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                Kernet
              </p>
            </a>
          </li>
          
          <li class="nav-header">Aktivitas</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/jadwal') ?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          <li class="nav-header">Perbaikan</li>
          <li class="nav-item">
            <a href="<?= base_url('admin/perbaikan') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Perbaikan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->



    <?php } elseif ($_SESSION['role'] == "Teknisi") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('kepala/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('teknisi/bus') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Perbaikan Bus
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } elseif ($_SESSION['role'] == "User") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('user/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/suratmasuk/') ?>" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Surat Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/suratkeluar/') ?>" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Surat Keluar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/spd/') ?>" class="nav-link">
              <i class="nav-icon fas fa-plane-departure"></i>
              <p>
                Surat Perjalanan Dinas
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } ?>
  </div>
  <!-- /.sidebar -->
</aside>