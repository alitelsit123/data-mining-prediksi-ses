<!-- Navbar-->
<ul class="navbar-nav ml-auto ml-md-0">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">Settings</a>
      <a class="dropdown-item" href="#">Activity Log</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="login.html">Logout</a>
    </div>
  </li>
</ul>
</nav>
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Core</div>
          <a class="nav-link" href="<?= base_url() ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>
          <div class="sb-sidenav-menu-heading">DATA</div>
          <a class="nav-link" href="<?php echo site_url('/wilayah') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Data Wilayah
          </a>
          <a class="nav-link" href="<?php echo site_url('/periode') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Data Periode
          </a>
          <a class="nav-link" href="<?= base_url('/aktual') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Data Aktual
          </a>
          <div class="sb-sidenav-menu-heading">FORECAST</div>
          <a class="nav-link" href="<?= base_url('/prediksi') ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Forecasting
          </a>
          <div class="sb-sidenav-menu-heading">LAPORAN</div>
          <a class="nav-link" href="charts.html">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Laporan Kabupaten
          </a>
          <a class="nav-link" href="chart.html">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Rekap Provinsi
          </a>

          <!-- <div class="sb-sidenav-menu-heading">Addons</div>
          <a class="nav-link" href="charts.html">
            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
            Charts
          </a>
          <a class="nav-link" href="tables.html">
            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
            Tables
          </a> -->
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
      </div>
    </nav>
  </div>
  <div id="layoutSidenav_content">