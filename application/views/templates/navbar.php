<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav navbar-right ml-auto  px-3">
      <?php if($this->session->userdata('username')) { ?>
        <li><div class="mr-5 pr-2">Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
        <li><?php echo anchor('auth/logout','Logout') ?></li>
      <?php } else{ ?>
        <li><?php echo anchor('auth/login','Login') ?></li>
      <?php } ?>

    </ul>

  </nav>
  <!-- /.navbar -->