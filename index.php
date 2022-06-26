<?php 
session_start();
require 'koneksi.php';
function kirimEmail($namaPenerima, $emailPenerima, $pesan){
    $url = "https://fimail.vercel.app/send";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = <<<DATA
    {
        "from": {
            "name": "$namaPenerima",
            "address": "$emailPenerima"
        },
        "to": {
            "name": "Admin Cessgo",
            "address": "anissa.fidelia@gmail.com"
        },
        "subject": "Pesan Kontak - WEB CESSGO",
        "contents": "$pesan"
    }
DATA;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}

if(isset($_POST["submit-message"])){
    $nama = $_POST["name"];
    $email = $_POST["email"];
    $pesan = $_POST["message"];
    if(kirimEmail($nama, $email, $pesan)){
        echo "<script>
            alert('Pesan Anda berhasil di Kirim!!!');
        </script>";
    }
}
?>
<?php require 'template/head.php'; ?>
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
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary btn-shadow btn-lg" type="submit" name="submit-message">Send Message</button>
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
                    <a href="daftar.php" class="btn btn-outline-primary btn-lg">Registrasi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Features Section--></div>
<?php require 'template/footer.php'; ?>
