<?php require 'template/head.php'; ?>
	
</div>	
    <video id="video" width="100%" height="100%" autoplay controls loop>
      <source src="testimoni.mp4" type="video/mp4">
    </video>
      <div class="container text-center" >
  </div>
<!-- <div id="jmb" class=" jumbotron jumbotron-single d-flex align-items-center " style="background-image: url(img/bg2.jpg);">
  <div class="container text-center" >
    <h1 class="display-2 mb-4">Testimoni</h1>
  </div>
</div>	 -->
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
                <?php if(empty($testimoni)) : ?>
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
                        <h4 class="testi-text">CESSGO membuat saya betah belajar dengan struktur yang ada<br>saya bisa mengembangkan apa yang ada di dalam diri saya.</h4>
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
                <?php else: ?>
                    <?php foreach($testimoni as $tes) : ?>
                        <div class="testi-item text-center">
                            <i class="testi-icon fa fa-3x fa-quote-left"></i>
                            <h4 class="testi-text"><?= $tes["testimoni"]; ?></h4>
                            <div class="testi-meta-inner d-flex justify-content-center align-items-center">
                                <div class="testi-img mr-2">
                                    <img src="img/testimoni/<?= $tes["foto"]; ?>" alt="">
                                </div>
                                <div class="testi-details">
                                    <p class="testi-author mb-0 font-weight-bolder"><?= $tes["nama"]; ?></p>
                                    <p class="testi-desc mb-0"><?= $tes["title"]; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                </div>
                <!-- End of Testimonial -->
            </div>
        </div>
    </div>
</section>
<!-- End of Testimonial Section-->	<!-- Portfolio Section -->
</section>
<!-- End of Blog Section -->	<!-- Features Section-->

<!-- End of Features Section--></div>
<?php require 'template/footer.php'; ?>
