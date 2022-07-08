<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('assets/dashboard') ?>//index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets/dashboard') ?>//index3.html" class="brand-link">
      <img src="<?= base_url('assets/dashboard') ?>//dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/dashboard') ?>//dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?= site_url('dashboard/user') ?>" class="nav-link">
							<i class="nav-icon fas fa-user"></i>
              <p>
                Users Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/mobil') ?>" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
                Mobil Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/merk') ?>" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
                Merk Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/jenisperawatan') ?>" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
                Jenis Perawatan Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard/perawatan') ?>" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
                Perawatan Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('auth/logout') ?>" class="nav-link">
							<i class="nav-icon fas fa-book"></i>
							<p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
