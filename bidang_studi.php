<?php 
require 'koneksi.php';
// $deskripsi = "Merupakan Jenis Bidang Yang sangat banyak diminati oleh mahasiswa dan tidak hanya itu bidang ini juga murah serta mudah untuk dipelajari ya guys ya.";
// $mentor = "Irpan dan Amal";
// $bidang = ["Fotografi", "Web Design", "Robot", "Design Grafis", "Database", "Audio Visual"];
// $kuota = 50;
// $foto = '';
// foreach($bidang as $bid){
//     $foto = "$bid.jpg";
//     mysqli_query($conn, "INSERT INTO bidang_studi VALUES('', '$bid', '$deskripsi', '$kuota', '$mentor', '$foto')");
//     $kuota -= 5;
// }
$bidang_studi = getData("SELECT * FROM bidang_studi");


require 'template/head.php'; ?>
	
</div>	<div class="jumbotron jumbotron-single d-flex align-items-center" style="background-image: url(img/bg2.jpg)">
  <div class="container text-center">
    <h1 class="display-2 mb-4">Bidang Studi</h1>
  </div>
</div>	
<section id="who-we-are" class="bg-white">
    <div class="container">
        <div class="section-content">
            <div class="title-wrap mb-3" data-aos="fade-up">
                <h2 class="section-title">Bidang Studi <b>CESSGO</b></h2>
            </div>
            
            <div class="row">
                <?php foreach($bidang_studi as $studi) : ?>
                    <div class="col-md-6" data-aos="fade-up">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="img/bidang_studi/<?= $studi["foto"]; ?>" width="100%" height="100%" alt="Bidang Studi">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"> <b><?= $studi["nama_bidang"]; ?></b> </h4>
                                <p class="card-text"><?= $studi["deskripsi"]; ?>
                                    
                                <h6><b>Mentor : </b> <?= $studi["mentor"]; ?></h6>
                                </p>
                                <p class="card-text"><small class="text-muted">Sisa Kuota : <b><?= $studi["kuota"]; ?> Orang</b> </small></p>
                                <a href="daftar.php?bidang=<?= $studi["nama_bidang"]; ?>" class="badge badge-primary">Daftar</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

</section>	<!-- Features Section-->
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
<?php require 'template/footer.php'; ?>
