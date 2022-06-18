<?php 
require 'koneksi.php';
// Ambil data dari tblmhs
$result = mysqli_query($conn, "SELECT * FROM user")
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
    <title>Cessgo</title>
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
<?php 
session_start();
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
header("location:login.php?pesan=gagal");
}
?>
<body data-spy="scroll" data-target="#navbar" class="static-layout">
	<nav id="header-navbar" class="navbar navbar-expand-lg py-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-white" href="index_mahasiswa.php">
            <h2 class="font-weight-bolder mb-0">CESSGO</h2>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="index_mahasiswa.php">
            <h5 class="font-weight-bolder mb-0">Home</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="program_mahasiswa.php">
            <h5 class="font-weight-bolder mb-0">Program</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="Testimoni_mahasiswa.php">
            <h5 class="font-weight-bolder mb-0">Testimoni</h5>
        </a>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="jadwal_mahasiswa.php">
            <h5 class="font-weight-bolder mb-0">Jadwal</h5>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-menu"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-nav-header">
            <ul class="navbar-nav ml-auto">
                
              
            
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><h4>Keluar<h4></a>
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
	
</div>	<div class="jumbotron jumbotron-single d-flex align-items-center" style="background-image: url(img/bg2.jpg)">
  <div class="container text-center">
    <h1 class="display-2 mb-4">Testimoni</h1>
  </div>
</div>	
<section id="who-we-are" class="bg-white">
<section id="testimonial" class="section-padding bg-fixed bg-white overlay" style="background-image: url(img/bg-white.jpg);">
    <div class="container">
        <div class="section-content" data-aos="fade-up">
            <div class="heading-section text-center">
                <h2>
                     Testimonials
                </h2>
            </div>
            <div class="row">
                <!-- Testimonial -->
                <div class="testi-content testi-carousel owl-carousel">
                    <div class="testi-item text-center">
                        <i class="testi-icon fa fa-3x fa-quote-left"></i>
                        <h4 class="testi-text"><b>Di CESSGO</b> belajar jadi menyenangkan.<br>kita diajak berdiskusi sambil bermain!</h4>
                        <div class="testi-meta-inner d-flex justify-content-center align-items-center">
                            <div class="testi-img mr-2">
                                <img src="img/toriq.jpeg" alt="">
                            </div>
                            <div class="testi-details">
                                <p class="testi-author mb-0 font-weight-bolder">Muhammad Toriq</p>
                                <p class="testi-desc mb-0">Mahasiswa Teknik Komputer</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="testi-item text-center">
                        <i class="testi-icon fa fa-3x fa-quote-left"></i>
                        <h4 class="testi-text">CESSGO membuat saya betah belajar dengan struktur yang ada<br>saya bisa mengebangkan apa yang ada di dalam diri saya.</h4>
                        <div class="testi-meta-inner d-flex justify-content-center align-items-center">
                            <div class="testi-img mr-2">
                                <img src="img/anissa.jpeg" alt="">
                            </div>
                            <div class="testi-details">
                                <p class="testi-author mb-0 font-weight-bolder">Anissa Tri Astuti</p>
                                <p class="testi-desc mb-0">Mahasiswa Teknik Komputer</p>
                            </div>
                        </div>
                    </div>
                     <div class="testi-item text-center">
                        <i class="testi-icon fa fa-3x fa-quote-left"></i>
                        <h4 class="testi-text">Banyak ilmu yang saya ambil di CESSGO <br>untuk itu saya sangat semangat untuk mendalami bidang yang saya pilih.</h4>
                        <div class="testi-meta-inner d-flex justify-content-center align-items-center">
                            <div class="testi-img mr-2">
                                <img src="img/wawan.jpeg" alt="">
                            </div>
                            <div class="testi-details">
                                <p class="testi-author mb-0 font-weight-bolder">Kurniawan Adi Saputra</p>
                                <p class="testi-desc mb-0">Web Designer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Testimonial -->
            </div>
        </div>
    </div>
</section>
<!-- End of Testimonial Section-->	<!-- Portfolio Section -->
</section>
<!-- End of Blog Section -->	<!-- Features Section-->
<section id="cessgo" class="overlay bg-fixed" style="background-image: url(img/bg2.jpg);">
    <div class="container">
        <div class="section-content" data-aos="fade-up">
            <div class="row ">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="title-wrap mb-5">
                        <h2>Politeknik <span> Negeri</span> Sriwijaya</h2>
                    </div>
                    <!-- End of Section Title -->
                </div>
                <!-- Client Holder -->
                <div class="col-md-12 client-holder">
                    <div class="client-slider owl-carousel">
                        <div class="client-item">
                            <img class="img-responsive" src="img/polsri.png" alt=" ">
                        </div>
                        <div class="client-item">
                            <img class="img-responsive" src="img/polsri.png" alt=" ">
                        </div>
                        <div class="client-item">
                            <img class="img-responsive" src="img/polsri.png" alt=" ">
                        </div>
                        <div class="client-item">
                            <img class="img-responsive" src="img/polsri.png" alt=" ">
                        </div>
                        <div class="client-item">
                            <img class="img-responsive" src="img/polsri.png" alt=" ">
                        </div>
                        <div class="client-item">
                            <img class="img-responsive" src="img/polsri.png" alt=" ">
                        </div>
                    </div>
                    <!-- End of Client Holder -->
                </div>
            </div>
        </div>
</section>
<!-- End of Features Section--></div>
<footer class="mastfoot my-3">
    <div class="inner container">
         <div class="row">
         	<div class="col-lg-4 col-md-12 d-flex align-items-center">
         		
         	</div>
         	<div class="col-lg-4 col-md-12 d-flex align-items-center">
         		<p class="mx-auto text-center mb-0"> &copy;2022 Politeknik Negeri Sriwijaya. Design by Anissa Fidelia</a>.</p>
         	</div>
           
            <div class="col-lg-4 col-md-12">
            	<nav class="nav nav-mastfoot justify-content-center">
	                <a class="nav-link" href="#">
	                	<i class="fab fa-facebook-f"></i>
	                </a>
	                <a class="nav-link" href="#">
	                	<i class="fab fa-twitter"></i>
	                </a>
	                <a class="nav-link" href="#">
	                	<i class="fab fa-instagram"></i>
	                </a>
	                <a class="nav-link" href="#">
	                	<i class="fab fa-linkedin"></i>
	                </a>
	                <a class="nav-link" href="#">
	                	<i class="fab fa-youtube"></i>
	                </a>
	            </nav>
            </div>
            
        </div>
    </div>
</footer>	<!-- External JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
	<script src="vendor/bootstrap/popper.min.js"></script>
	<script src="vendor/bootstrap/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js "></script>
	<script src="vendor/owlcarousel/owl.carousel.min.js"></script>
	<script src="vendor/stellar/jquery.stellar.js" type="text/javascript" charset="utf-8"></script>
	<script src="vendor/isotope/isotope.min.js"></script>
	<script src="vendor/lightcase/lightcase.js"></script>
	<script src="vendor/waypoints/waypoint.min.js"></script>
	 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	 
	<!-- Main JS -->
	<script src="js/app.min.js "></script>
	<script src="//localhost:35729/livereload.js"></script>
</body>
</html>
