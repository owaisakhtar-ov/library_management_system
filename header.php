<?php
session_start();
include ("connection.php");
if(isset($_SESSION["NAME"]))
{
    @$UserName = strtoupper($_SESSION["NAME"]);
    @$Role = strtoupper($_SESSION["ROLE"]);

}
else
{
    header("Location:login.php");   
}
?>
<?php
if(isset($_POST["logout"]))
{
    unset($_SESSION["NAME"]);
    header("Location:login.php");   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LibrarianXD Online</title>
<link rel="icon" href="dist/img/favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <!-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"> -->
        <div class="input-group-append">
       <!--    <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button> -->
        </div>
      </div>
    </form>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown"><form method="POST">
        <button type="submit" class="btn btn-danger" style="background-color: #343a40;" name="logout">Logout</button></form>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logowhite.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LibrarianXD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo @$Role ; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <div class="input-group-append">
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transactions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bookissue.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book Issue</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bookreturn.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book Return</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($Role == "ADMIN"){
            echo "
            <li class='nav-item'>
            <a href='#' class='nav-link'>
              <i class='nav-icon fas fa-chart-pie'></i>
              <p>
                Master
                <i class='right fas fa-angle-left'></i>
              </p>
            </a>
            <ul class='nav nav-treeview'>
              <li class='nav-item'>
                <a href='user.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>User</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='student.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Student</p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='book.php' class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Book</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
          </li>
            ";
          } ?>
          

     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>