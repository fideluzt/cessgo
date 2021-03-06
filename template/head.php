<?php 
// session_start();
require 'koneksi.php';
$url = $_SERVER['REQUEST_URI'];
$url = explode("/cessgo/",$url)[1];

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$request_uri = $uri_parts[0];


switch ($request_uri) {
  case '/cessgo/visi_misi.php':
    $title="";
    break;
  case '/cessgo/program.php':
    $title="Program | CESSGO";
    break;
  case '/cessgo/bidang_studi.php':
    $title="Bidang Studi | CESSGO";
    break;
  case '/cessgo/testimoni.php':
    $title="Testimoni | CESSGO";
    break;
  case '/cessgo/review.php':
    $title="Review | CESSGO";
    break;
  default :
    $title="Home | CESSGO";
}
$data_mentor = getData("SELECT * FROM user WHERE level = 'mentor'");
$data_bidang = getData("SELECT * FROM bidang_studi");
$testimoni = getData("SELECT * FROM testimoni WHERE ket = '1'");

// var_dump($testimoni);
// die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--
     - Roxy: Bootstrap template by GettTemplates.com
     - https://gettemplates.co/roxy
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <meta name="description" content="Roxy">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/lightcase/lightcase.css">
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Work+Sans:300,400,700" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <style>
        .link-active {
            font-weight: bold;
            padding: 5px;
            background-color: white;
            color: red;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .lds-facebook {
        display: inline-block;
        position: relative;
        top: 50%;
        width: 80px;
        height: 80px;
        }
        .lds-facebook div {
        display: inline-block;
        position: absolute;
        left: 8px;
        width: 16px;
        background: #ff00cc;
        animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }
        .lds-facebook div:nth-child(1) {
        left: 8px;
        animation-delay: -0.24s;
        }
        .lds-facebook div:nth-child(2) {
        left: 32px;
        animation-delay: -0.12s;
        }
        .lds-facebook div:nth-child(3) {
        left: 56px;
        animation-delay: 0;
        }
        @keyframes lds-facebook {
        0% {
            top: 8px;
            height: 64px;
        }
        50%, 100% {
            top: 24px;
            height: 32px;
        }
        }

        .loading {
            z-index: 9999;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            text-align: center;
            background-color: white;
        }

        a {
            text-decoration: none;
        }

    </style>

</head>
<body data-spy="scroll" onload="loading();" data-target="#navbar" class="static-layout">
<div class="hide loading">
    <div class="lds-facebook"><div></div><div></div><div></div></div>
</div>
	<nav id="header-navbar" class="navbar navbar-expand-lg py-4">
    <div class="container">
        <!-- Set Flash -->
        <?=  flash(); ?>
        <a class="navbar-brand d-flex align-items-center text-white " href="index.php">
           <img src="img/tekkom.png" width="40" class="mr-2" alt="Logo Tekkom"> <h2 class="font-weight-bolder mb-0">CESSGO</h2>
        </a>
        <a class="navbar-brand d-flex align-items-center <?= $url == "index.php" || $url == "" ? "link-active" : "text-white"; ?>" href="index.php">
            <h5 class="font-weight-bolder mb-0">Home</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center <?= $url == "visi_misi.php" ? "link-active" : "text-white"; ?> " href="visi_misi.php">
            <h5 class="font-weight-bolder mb-0">Visi Misi</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center <?= $url == "program.php" ? "link-active" : "text-white"; ?>" href="program.php">
            <h5 class="font-weight-bolder mb-0">Program</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center <?= $url == "bidang_studi.php" ? "link-active" : "text-white"; ?>" href="bidang_studi.php">
            <h5 class="font-weight-bolder mb-0">Bidang Studi</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center <?= $url == "review.php" ? "link-active" : "text-white"; ?>" href="review.php">
            <h5 class="font-weight-bolder mb-0">Review</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center <?= $url == "testimoni.php" ? "link-active" : "text-white"; ?>" href="testimoni.php">
            <h5 class="font-weight-bolder mb-0">Testimoni</h5>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-nav-header">
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><h4>Login<h4></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftar.php"><h4>Daftar<h4></a>
                </li>
                <li class="nav-item">
                    <a id="side-search-open" class="nav-link" href="#">
                        <span class="lnr lnr-magnifier"></span>
                    </a>
                </li>
                 <li class="nav-item only-desktop">
                    <a class="nav-link" id="side-nav-open" href="#">
                        <span class="lnr lnr-menu"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="side-nav" class="sidenav">
	<a href="javascript:void(0)" id="side-nav-close">&times;</a>
	
	<div class="sidenav-content">
		<p>
			Jalan Srijaya, Bukit , Palembang
		</p>
		<p>
			<span class="fs-16 primary-color">(+62) 120034509</span>
		</p>
		<p>InfoPolsri@yahoo.com</p>
	</div>
</div><div id="side-search" class="sidenav">
	<a href="javascript:void(0)" id="side-search-close">&times;</a>
	<div class="sidenav-content">
		<form action="">

			<div class="input-group md-form form-sm form-2 pl-0">
			  <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
			  <div class="input-group-append">
			    <button class="input-group-text red lighten-3" id="basic-text1">
			    	<span class="lnr lnr-magnifier"></span>
			    </button>
			  </div>
			</div>

		</form>
	</div>
	