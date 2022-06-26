<?php
if(!session_id())session_start();
include '../koneksi.php';
$username = $_SESSION["username"];
$data_user = getData("SELECT * FROM user WHERE username = '$username'");
$url = $_SERVER['REQUEST_URI'];

$url = explode("/cessgo/",$url)[1];

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$request_uri = $uri_parts[0];
switch ($request_uri) {
  
  case '/cessgo/dashboard/change_password.php':
    $title="Change Password | CESSGO";
    $bread = "Change Password";
    $link = "change_password.php";
    break;
  case '/cessgo/dashboard/jadwal_mhs.php':
    $title="Jadwal Kelas | CESSGO";
    $bread = "Jadwal Kelas";
    $link = "jadwal_mhs.php";
    break;
  case '/cessgo/dashboard/profil.php':
    $title="Profil | CESSGO";
    $bread = "Profil";
    $link = "profil.php";
    break;
  case '/cessgo/dashboard/admin.php':
    $title="Dashboard | CESSGO";
    $bread = "Dashboard";
    $link = "admin.php";
    break;
  case '/cessgo/dashboard/data_peserta.php':
    $title="Data Peserta | CESSGO";
    $bread = "Data Peserta";
    $link = "data_peserta.php";
    break;
  case '/cessgo/dashboard/jadwal_admin.php':
    $title="Jadwal Kelas | CESSGO";
    $bread = "Jadwal Kelas";
    $link = "jadwal_admin.php";
    break;
  default:
  $title="Dashboard | CESSGO";
   $bread = "Dashboard";
    $link = "admin.php";

 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="../dist/sweetalert2.min.css">
  <style>
    a{
      text-decoration: none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
   <!-- Penampil flash -->
      <?php if(isset($_SESSION["login"])) : ?>
        <div id="session" data-login="<?= $_SESSION["login"]; ?>"></div>
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../img/cessgo.jpeg" alt="AdminLTELogo" height="60" width="60">
        </div>
        <?php unset($_SESSION["login"]); ?>
    <?php endif; ?>
    


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Set Flash -->
          <?= flash(); ?>
          <?= info(); ?>

  </nav>
  <!-- /.navbar -->
     <!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutLabel">Konfirmasi Pesan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Keluar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="../logout.php" class="btn btn-primary">Logout</a>
      </div>
    </div>
  </div>
</div>