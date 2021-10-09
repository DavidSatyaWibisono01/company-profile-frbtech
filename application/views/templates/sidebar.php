
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional)
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">FRB Technology</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url(); ?>user" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>slider" class="nav-link">
              <i class="fas fa-images"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>excellence" class="nav-link">
            <i class="fas fa-medal"></i>
              <p>
                Excellence
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>services" class="nav-link">
              <i class="fas fa-hand-holding"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>client" class="nav-link">
              <i class="far fa-handshake"></i>
              <p>
                Client
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>setCon" class="nav-link">
              <i class="fas fa-id-card-alt"></i>
              <p>
                Setting Contact
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>portofolio" class="nav-link">
              <i class="fas fa-table"></i>
              <p>
                Portofolio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>product" class="nav-link">
              <i class="fas fa-archive"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>ganti_pass" class="nav-link">
              <i class="far fa-edit"></i>
              <p>Ganti password</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?= base_url(); ?>auth" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>