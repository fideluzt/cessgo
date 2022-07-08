<section id="cessgo" <?= $url == "index.php" || $url == "" ? "" : 'class="overlay bg-fixed" style="background-image: url(img/bg2.jpg);"';?> >
    <div class="container">
        <div class="section-content" data-aos="fade-up" >
            <div class="row ">
                <div class="col-md-12">
                    <!-- Section Title -->
                    <div class="title-wrap mb-5">
                        <h2>Bidang Studi <b>CESSGO</b></h2>
                    </div>
                    <!-- End of Section Title -->
                </div>
                <!-- Client Holder -->
                <div class="col-md-12 client-holder">
                    <div class="client-slider owl-carousel">
                        <?php foreach($data_bidang as $bidang) : ?>
                            <div class="client-item">
                                <img class="img-responsive d-block" src="img/bidang_studi/<?= $bidang["foto"]; ?>" alt=" ">
								<p style="font-weight:bold;"><b><?= $bidang["nama_bidang"]; ?></b></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- End of Client Holder -->
                </div>
            </div>
        </div>
</section>
<?php if($url == "index.php" || $url == "") : ?>
	<section id="cta" class="bg-fixed overlay" style="">
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
<?php endif; ?>
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
	 <script src="js/sweetalert2.all.min.js"></script>
	 <script src="js/myscript.js"></script>
	 
	<!-- Main JS -->
	<script src="js/app.min.js "></script>
	<script src="//localhost:35729/livereload.js"></script>
	<script>
		function loading(){
			let target = document.querySelector('.loading');
			console.log(target);
			let fadeEffect = setInterval(() => {
				if(!target.style.opacity){
					target.style.opacity = 1;
				}
				if(target.style.opacity > 0){
					target.style.opacity -= 0.1;
				}else{
					clearInterval(fadeEffect);
					$('.hide').hide();
				}
			}, 40);
		}
	</script>
</body>
</html>