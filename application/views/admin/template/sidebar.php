<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url()?>/asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>/asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('Admin/dashboard')?>" class="nav-link <?php if($judul == "Dashboard"){echo "active";} ?>">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Admin/A_agenda')?>" class="nav-link <?php if($judul == "Agenda"){echo "active";} ?>">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Agenda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Admin/A_pengguna')?>" class="nav-link <?php if($judul == "Pengguna"){echo "active";} ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Admin/A_galeri')?>" class="nav-link <?php if($judul == "Galeri"){echo "active";} ?>">
              <i class="nav-icon fas fa-camera"></i>
              <p>
                Galeri
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('Admin/A_pengumuman')?>" class="nav-link <?php if($judul == "Pengumuman"){echo "active";} ?>">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Pengumuman
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if($judul == "Guru" || $judul == "Siswa"){echo "menu-open";} ?>">
            <a href="#" class="nav-link <?php if($judul == "Guru" || $judul == "Siswa"){echo "active";} ?>">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Akademisi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Admin/A_guru')?>" class="nav-link <?php if($judul == "Guru"){echo "active";} ?>">
                  <i class="right fas fa-user"></i>
                  <p>Guru</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('Admin/A_siswa')?>" class="nav-link <?php if($judul == "Siswa"){echo "active";} ?>">
                  <i class="right fas fa-user"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('Admin/A_kelas')?>" class="nav-link <?php if($judul == "Kelas"){echo "active";} ?>">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('Admin/A_file')?>" class="nav-link <?php if($judul == "File"){echo "active";} ?>">
              <i class="nav-icon fas fa-file"></i>
              <p>
                File
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url()?>" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                Kembali Ke Web
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Halaman <?php echo $judul; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    