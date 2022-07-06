<?php 
require 'template/head.php';
$bidang_studi = getData("SELECT * FROM bidang_studi");
$data_mentor = getData("SELECT * FROM user WHERE level = 'mentor'");


?>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

</div>	<div class="jumbotron jumbotron-single d-flex align-items-center" style="background-image: url(img/bg2.jpg)">
  <div class="container text-center">
    <h1 class="display-2 mb-4">Bidang Studi</h1>
  </div>
</div>	
<section id="who-we-are" class="bg-white">
    <div class="container">
        <div class="section-content">
            <div class="title-wrap mb-3" data-aos="fade-up">
                <h2 class="section-title">Bidang Studi <br> <b>CESSGO</b></h2>
            </div>
            
            <div class="row">
                <?php foreach($bidang_studi as $studi) : ?>
                    <div class="col-md-6" data-aos="fade-up">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-md-4">
                            <img src="img/bidang_studi/<?= $studi["foto"]; ?>" width="100%" class="img-<?= $studi["id"]; ?>" data-id="<?= $studi["id"]; ?>" height="100%" alt="Bidang Studi">
                            
                          
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"> <b><?= $studi["nama_bidang"]; ?></b> </h4>
                                <p class="card-text"><?= $studi["deskripsi"]; ?>
                                   
                                        <h6><b>Mentor : </b> 
                                        <?php 
                                         foreach($data_mentor as $mentor){

                                             if($mentor["kelas"] == $studi["nama_bidang"]){
                                                 echo $mentor["nama"];
                                             }
                                         }
                                        
                                        
                                        ?>
                                    
                                    -</h6>
                                </p>
                                <p class="card-text"><small class="text-muted">Sisa Kuota : <b><?= $studi["kuota"]; ?> Orang</b> </small></p>
                                <a href="daftar.php?bidang=<?= $studi["nama_bidang"]; ?>" style="text-decoration:none;" class="badge badge-primary">Daftar</a>
                                <!-- Button trigger modal -->
                                <button type="button" style="height: 20px; line-height: 0px;" onclick="videoPlay(<?=$studi['id']?>)"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#video-<?= $studi["id"]; ?>">
                                Video
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="video-<?= $studi["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Video <?= $studi["nama_bidang"]; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="col">
                                                <video id="video<?=$studi["id"]?>" width="100%" height="30%" loop controls>
                                                <source src="video/<?= $studi["video"]; ?>" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    function videoPlay(id){
        var video = document.getElementById("video"+id);
        video.play();
    }
</script>
