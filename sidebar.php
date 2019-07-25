<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center not-active" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-atom"></i>
    </div>
    <div class="sidebar-brand-text mx-3">NT System <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

<?php 

switch($do){

  case "admin":
  
?>

  
  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span class="sidebar-text">資料管理</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Management:</h6>
        <a class="collapse-item" href="index.php?do=admin&ad=items">Product</a>
        <a class="collapse-item" href="index.php?do=admin&ad=emp">Employee</a>
        <a class="collapse-item" href="index.php?do=admin&ad=client">Client</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="index.php?do=utilities-color">Colors</a>
        <a class="collapse-item" href="index.php?do=utilities-border">Borders</a>
        <a class="collapse-item" href="index.php?do=utilities-animation">Animations</a>
        <a class="collapse-item" href="index.php?do=utilities-other">Other</a>
      </div>
    </div>
  </li>

  <hr class="sidebar-divider">

  <div class="sidebar-heading">
    Addons
  </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="index.php?do=login">Login</a>
        <a class="collapse-item" href="index.php?do=register">Register</a>
        <a class="collapse-item" href="index.php?do=forgot-password">Forgot Password</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="index.php?do=404">404 Page</a>
        <a class="collapse-item" href="index.php?do=blank">Blank Page</a>
      </div>
    </div>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <?php
    break;
    case "login":
    case "register":
    case "member":
    case "content":
    case "forgot-password":
    default:
  ?>

  
  <li class="nav-item">
    <a class="nav-link" href="index.php?do=charts">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="index.php?do=content&repo=items">
      <i class="fas fa-fw fa-table"></i>
      <span class="sidebar-text">年度業務狀況</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="index.php?do=content&repo=sales">
      <i class="fas fa-fw fa-table"></i>
      <span class="sidebar-text">業務部銷售狀況</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="index.php?do=content&repo=season">
      <i class="fas fa-fw fa-table"></i>
      <span class="sidebar-text">年度品項銷售狀況</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  <?php
    break;
}
  ?>

</ul>

