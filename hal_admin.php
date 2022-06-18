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
        <a class="navbar-brand d-flex align-items-center text-white" href="hal_admin.php">
            <h2 class="font-weight-bolder mb-0">CESSGO</h2>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="hal_admin.php">
            <h5 class="font-weight-bolder mb-0">Home</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="program_admin.php">
            <h5 class="font-weight-bolder mb-0">Program</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="Testimoni_admin.php">
            <h5 class="font-weight-bolder mb-0">Testimoni</h5>
        </a>
        <a class="navbar-brand d-flex align-items-center text-white" href="jadwal_admin.php">
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
			<span class="fs-16 primary-color">(+68) 120034509</span>
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
	
</div>	<div class="jumbotron d-flex align-items-center">
  <div class="container text-center">
    <h1 class="display-1 mb-4">CESSGO</h1><br><h3>Computer Engineering Student Study Group</h3>
  </div>
  <div class="rectangle-1"></div>
  <div class="rectangle-2"></div>
  <div class="rectangle-transparent-1"></div>
  <div class="rectangle-transparent-2"></div>
  <div class="circle-1"></div>
  <div class="circle-2"></div>
  <div class="circle-3"></div>
  <div class="triangle triangle-1">
  	<img src="img/obj_triangle.png" alt="">
  </div>
  <div class="triangle triangle-2">
  	<img src="img/obj_triangle.png" alt="">
  </div>
  <div class="triangle triangle-3">
  	<img src="img/obj_triangle.png" alt="">
  </div>
  <div class="triangle triangle-4">
  	<img src="img/obj_triangle.png" alt="">
  </div>
</div>	<!-- Features Section-->
<section id="features" class="bg-white">
    <div class="container">
        <div class="section-content">
            <!-- Section Title -->
            <div class="title-wrap mb-5" data-aos="fade-up">
                <h2 class="section-title">
                Apa saja yang bisa kamu dapatkan di<br>CESSGO?
                </h2>
                <p class="section-sub-title"></p>
            </div>
            <!-- End of Section Title -->
            <div class="row">
                <!-- Features Holder-->
                <div class="col-md-10 offset-md-1 features-holder">
                    <div class="row">
                        <!-- Features Item -->
                        <div class="col-md-4 col-sm-12 text-center mt-4">
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                    <i class="lnr lnr-cog fs-40"></i>
                                </div>
                                <h4>Creative Ideas</h4>
                                <p>Menambah kreativitas mahasiswa dalam menyalurkan potensi didalam dunia teknologi.</p>
                            </div>
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                    <i class="lnr lnr-frame-contract fs-40"></i>
                                </div>
                                <h4>Rapid Solution</h4>
                                <p>Menjadi salah satu solusi untuk mempelajari berbagai bidang dunia teknologi selain di bangku kuliah.</p>
                            </div>
                        </div>
                        <!-- End of Feature Item -->
                        <!-- Features Item -->
                        <div class="col-md-4 col-sm-12 text-center">
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                    <i class="lnr lnr-bubble fs-40"></i>
                                </div>
                                <h4>Socialize</h4>
                                <p>Menjadi ajang sosialisasi diantara mahasiswa serta bisa bertukar pikiran tentang teknlogi.</p>
                            </div>
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                    <i class="lnr lnr-magic-wand fs-40"></i>
                                </div>
                                <h4>Unravel the problem</h4>
                                <p>Bisa menjadi pembahasan tentang permasalahan dan juga mencari solusi tentang masalah-masalah yang sering terjadi di dunia teknologi.</p>
                            </div>
                        </div>
                        <!-- End of Feature Item -->
                        <!-- Features Item -->
                        <div class="col-md-4 col-sm-12 text-center mt-4">
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                    <i class="lnr lnr-book fs-40"></i>
                                </div>
                                <h4>Accommodate</h4>
                                <p>Mewadahi minat dari mahasiswa dan juga menunjang mahasiswa untuk lebih efisien dalam menggunakan teknologi.</p>
                            </div>
                            <div class="shadow rounded feature-item p-4 mb-4" data-aos="fade-up">
                                <div class="my-4">
                                    <i class="lnr lnr-thumbs-up fs-40"></i>
                                </div>
                                <h4>Built with SASS</h4>
                                <p>Dimana kita bisa memperoleh peluang bisnis di bidang teknologi.</p>
                            </div>
                        </div>
                        <!-- End of Feature Item -->
                    </div>
                </div>
                <!-- End of Features Holder-->
            </div>
        </div>
    </div>
</section>
<!-- End of Features Section-->	<section id="section-featurettes" class="featurettes overlay bg-fixed" style="background-image: url(img/bg2.jpg);">

    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center text-white">

                        <div class="col-md-4 offset-md-2 col-sm-6" data-aos="fade-right">
                            <h4 class="mb-4">Apa itu CESSGO?</h4>
                            <p>CESSGO merupakan bentuk support kepada mahasiswa jurusan teknik komputer dalam mengembangkan keterampilan dibidangnya.</p>
                            <button type="button" class="btn btn-outline-primary">FEATURES</button>
                        </div><!--/ .col-md-4.col-md-offset-2.col-sm-6 -->

                        <div class="col-md-4 offset-md-right-2 col-sm-6" data-aos="flip-right">
                            <img class="my-5" src="img/22.jpeg" alt="">
                        </div><!--/ .col-md-4.col-md-offset-right-2.col-sm-6 -->

                    </div><!--/ .featurettes-item -->

                </div><!--/ .col-md-12 -->

            </div><!--/ .row -->
        </div>
    </div><!--/ .container -->

</section>	<section id="section-featurettes" class="featurettes">

    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row align-items-center">

                        <div class="col-md-4 offset-md-2 col-sm-6" data-aos="flip-left">
                            <img class="my-5" src="img/ig2.jpeg" alt="">
                        </div><!--/ .col-md-4.col-md-offset-right-2.col-sm-6 -->

                        <div class="col-md-4 offset-md-right-2 col-sm-6" data-aos="fade-left">
                            <h4 class="mb-4">CESSGO On Social Media</h4>
                            <p>Tidak hanya media website, CESSGO juga terdapat di media sosial salah satu nya adalah Instagram. Untuk mensosialisasikan Cessgo ini di kalangan mahasiswa.</p>
                            <div class="progress mb-3">
                                <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">Instagram 95%</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">Website 90%</div>
                            </div>
                        </div><!--/ .col-md-4.col-md-offset-2.col-sm-6 -->

                    </div><!--/ .featurettes-item -->

                </div><!--/ .col-md-12 -->

            </div><!--/ .row -->
        </div>
    </div><!--/ .container -->


<section id="portfolio" class="bg-white">
    <div class="container">
        <div class="section-content">
            <!-- Section Title -->
            <div class="title-wrap">
                <h2 class="section-title">Galeri Kegiatan CESSGO</h2>
                <p class="section-sub-title">Dokumentasi kegiatan CESSGO .</p>
            </div>
            <!-- End of Section Title -->
            <div class="row">
                <!-- Portfolio Holder -->
                <div class="col-md-12 portfolio-holder mt-3">
                    <!-- Btn Filter -->
                    <div class="filter-button-group btn-filter d-flex justify-content-center">
                        <a tabindex="0" class="is-checked" data-filter="*">Show All</a>
                        <a tabindex="0" data-filter=".vintage">Launching</a>
                        <a tabindex="0" data-filter=".creative">Pembelajaran</a>
                    </div>
                    <!-- End of Btn Filter -->
                    <!-- Portfolio Content -->
                    <div class="grid-portfolio">
                        <div class="grid-sizer"></div>
                        <div class="gutter-sizer"></div>
                        <!-- Portfolio Item -->
                        <div class="grid-item creative" data-aos="fade-up">
                            <div class="grid-item-wrapper">
                                <img src="img/foto1.jpeg" alt="portfolio-img" class="portfolio-item">
                                <div class="grid-info">
                                    <div class="grid-link d-flex justify-content-center">
                                        <a class="img-pop" data-rel="lightcase" href="img/foto1.jpeg" title="Pembelajaran">
                                            <span class="lnr lnr-move"></span>
                                        </a>
                                        
                                    </div>
                                    <div class="grid-title">
                                        <h4>Pembelajaran</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End of Portfolio Item -->
                        <!-- Portfolio Item -->
                        <div class="grid-item vintage" data-aos="fade-up">
                            <div class="grid-item-wrapper">
                                <img src="img/launcing1.jpg" alt="portfolio-img" class="portfolio-item">
                                <div class="grid-info">
                                    <div class="grid-link d-flex justify-content-center">
                                        <a class="img-pop" data-rel="lightcase" href="img/launcing1.jpg" title="Launching">
                                            <span class="lnr lnr-move"></span>
                                        </a>
                                        
                                    </div>
                                    <div class="grid-title">
                                        <h4>Launching CESSGO</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End of Portfolio Item -->
                        <!-- Portfolio Item -->
                        <div class="grid-item creative grid-item-height" data-aos="fade-up">
                            <div class="grid-item-wrapper">
                                <img src="img/foto2.jpeg" alt="portfolio-img" class="portfolio-item">
                                <div class="grid-info">
                                    <div class="grid-link d-flex justify-content-center">
                                        <a class="img-pop" data-rel="lightcase" href="img/foto2.jpeg" title="Pembelajaran">
                                            <span class="lnr lnr-move"></span>
                                        </a>
                                        
                                    </div>
                                    <div class="grid-title">
                                        <h4>Pembelajaran</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End of Portfolio Item -->
                        <!-- Portfolio Item -->
                        <div class="grid-item creative" data-aos="fade-up">
                            <div class="grid-item-wrapper">
                                <img src="img/foto4.jpeg" alt="portfolio-img" class="portfolio-item">
                                <div class="grid-info">
                                    <div class="grid-link d-flex justify-content-center">
                                        <a class="img-pop" data-rel="lightcase" href="img/foto4.jpeg" title="Pembelajaran">
                                            <span class="lnr lnr-move"></span>
                                        </a>
                                       
                                    </div>
                                    <div class="grid-title">
                                        <h4>Pembelajaran</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End of Portfolio Item -->
                        <!-- Portfolio Item -->
                        <div class="grid-item vintage" data-aos="fade-up">
                            <div class="grid-item-wrapper">
                                <img src="img/launcing3.jpg" alt="portfolio-img" class="portfolio-item">
                                <div class="grid-info">
                                    <div class="grid-link d-flex justify-content-center">
                                        <a class="img-pop" data-rel="lightcase" href="img/launcing3.jpg" title="Launching CESSGO">
                                            <span class="lnr lnr-move"></span>
                                        </a>
                                        
                                    </div>
                                    <div class="grid-title">
                                        <h4>Launching CESSGO</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End of Portfolio Item -->
                        <!-- Portfolio Item -->
                        <div class="grid-item vintage" data-aos="fade-up">
                            <div class="grid-item-wrapper">
                                <img src="img/launcing2.jpg" alt="portfolio-img" class="portfolio-item">
                                <div class="grid-info">
                                    <div class="grid-link d-flex justify-content-center">
                                        <a class="img-pop" data-rel="lightcase" href="img/launcing2.jpg" title="Launching CESSGO">
                                            <span class="lnr lnr-move"></span>
                                        </a>
                                        
                                    </div>
                                    <div class="grid-title">
                                        <h4>Launching CESSGO</h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- End of Portfolio Item -->
                    </div>
                    <!-- End of Portfolio Content -->
                </div>
                <!-- End of Portfolio Holder -->
            </div>
        </div>
    </div>
</section>
<!-- End of Portfolio Section -->	<!-- Client Section -->
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
<!-- End of Client Section -->	<!-- Reservation Section -->
<section id="reservation" class="bg-white section-content">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 offset-lg-1 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="bg-white p-5 shadow">
                    <div class="heading-section text-center">
                        <h2 class="mb-4">
                            Kontak
                        </h2>
                    </div>
                    <form method="post" name="contact-us" action="">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="websiteUrl" name="websiteUrl" placeholder="Website">
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1" data-aos="fade-left">
                <h2 class="mb-4">
                    Hubungi kami
                </h2>
                <p class="mb-4">Untuk lebih mengetahui lagi tentang CESSGO<br>harap hubungi kami.</p>

               
            </div>
        </div>
        
    </div>
</section>
<!-- End of Reservation Section -->	<!-- Features Section-->
<section id="cta" class="bg-fixed overlay" style="background-image: url(img/bg2.jpg);">
    <div class="container">
        <div class="section-content" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="mb-2">Ayo segera bergabung bersama CESSGO!</h2>
                    <p></p>
                    <a class="btn btn-outline-primary btn-lg">Registrasi</a>
                </div>
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
         		<p class="mx-auto text-center mb-0">&copy; 2022 Politeknik Negeri Sriwijaya. Design by Anissa Fidelia</a>.</p>
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
