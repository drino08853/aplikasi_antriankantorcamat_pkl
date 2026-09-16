
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../assets/img/kota-padang-seeklogo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">CMT.PDG SELATAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/images/<?= $_SESSION['foto'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['nama_lengkap'] ?></a>
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
         
          <li class="nav-header">MENU</li>
          <li class="nav-item">
          <a href="?page=kategori/index" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'kategori/index') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Jenis Layanan</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="?page=antrian/index" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'antrian/index') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-microphone"></i>
              <p>Panggilan Antrian</p>
            </a>
          </li>
          <li class="nav-item">
          <a href="?page=laporan/index" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'laporan/index') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>Laporan Layanan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=setting/edit" class="nav-link <?php echo (isset($_GET['page']) && $_GET['page'] == 'setting/edit') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-cog"></i>
              <p>Setting Antrian</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  