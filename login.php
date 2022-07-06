<?php
session_start();
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!--
     - Roxy: Bootstrap template by GettTemplates.com
     - https://gettemplates.co/roxy
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | CESSGO</title>
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

</head>
<body data-spy="scroll" data-target="#navbar" class="static-layout">
	<nav id="header-navbar" class="navbar navbar-expand-lg py-4">
        <!-- Set Flash -->
        
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-purple" href="index.php">
            <h2 class="font-weight-bolder mb-0">CESSGO</h2>
        </a>
        <!-- <a class="navbar-brand d-flex align-items-center text-purple" href="index.php">
            <h5 class="font-weight-bolder mb-0">Home</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-purple" href="program.php">
            <h5 class="font-weight-bolder mb-0">Program</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-purple" href="Testimoni.php">
            <h5 class="font-weight-bolder mb-0">Testimoni</h5>
        </a> -->
       
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-nav-header">
            <ul class="navbar-nav ml-auto">
             <li class="nav-item">
                    <a id="side-search-open" class="nav-link" href="#">
                        <span class="lnr lnr-magnifier"></span>
                    </a>
                    <li class="nav-item">
                    <a class="navbar-brand d-flex align-items-center text-purple" href="daftar.php"><h4>Daftar<h4></a>
                </li>
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/app/css/style.css">
    <link rel="stylesheet" href="assets/app/css/main.css">

    <title>Login CESSGO</title>
</head>
<body>

    <br><br><div class="container py-5">

        <h3 class="pb-md-5 text-center text-blue-dark">
            <br>
            <small></small>
        </h3>
        
        <div class="row my-5 d-flex justify-content-around">
            <div class="col-lg-5 my-auto d-none d-lg-block">
                <img src="img/22.jpeg" class="img-fluid">
            </div>
            <div class="col-lg-4 col-md-6">

                <div class="card border-0 bg-purple-dark shadow">
                    <div class="card-body">


                            <h3 class="text-light">Login</h3>

                            <p>
                                <small class="text-light">*Masukkan NIM dan Password </small>
                            </p>
                            <hr>
                            <form action="proses_login.php" method="post">
                                <?= flashSistem(); ?>
                            <div class="form-group">
                            
                                <label class="text-light" for="username">NIM*</label>
                                <input type="username" name="username" placeholder="Masukan NIM" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="text-light" for="password">Password*</label>
                                <input type="password" name="password" placeholder="Masukan Password" class="form-control">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-light" for="exampleCheck1">Remember Me</label>
                            </div>
                            <button type="submit" name="login"  class="btn btn-block btn-yellow">Masuk</button>
                            
                            
                        </form>
                        
                       <p class="text-white mt-3">Kembali Ke Beranda Klik <a href="index.php" class="">Disini</a> </p> 
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/popperjs/dist/umd/popper.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/myscript.js"></script>
</body>
</html>
