<?php 
include '../template/admin/head.php' ?>
<?php include '../template/admin/sidebar.php' ?>
<?php
// include '../koneksi.php';
$username = $_SESSION["username"];
$data_user = getData("SELECT * FROM user WHERE username = '$username'")[0];

// edit profil
if(isset($_POST["btn-simpan"])){
  if(updateProfil($_POST) > 0){
    setFlash("Diupdate", "True", "Profil");
    echo "<script>
      document.location.href = 'profil.php';
    </script>";
  }else{
    setFlash("Diupdate", "False", "Profil");
    echo "<script>
      document.location.href = 'profil.php';
    </script>";
  }
}
?>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Edit Profil -->
        <?php if(isset($_GET["editProfil"])) : ?>
          <div class="row">
             <form action="" method="post" enctype="multipart/form-data">
                  <div class="col-lg-4">
                      <img src="../img/profile/<?= $data_user["foto"]; ?>" alt="Foto Profil" width="150px">
                      <div class="col-lg-4">
                        <input type="file" class="form-control mt-2 ms-3" name="gambar">
                      </div>
                       <input type="hidden" value="<?= $data_user["foto"]; ?>" name="gambar_lama">
                  </div>
                  <div class="col-lg-4">
                    <div class="mb-2">
                      <label for="nim" class="form-label">NIM</label>
                      <input type="text" value="<?= $data_user["username"]; ?>" readonly class="form-control" id="nim" name="nim">
                    </div>       
                    <div class="mb-2">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" value="<?= $data_user["nama"]; ?>" class="form-control" id="nama" name="nama">
                    </div>       
                    <div class="mb-2">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" value="<?= $data_user["email"]; ?>" class="form-control" id="email" name="email">
                    </div>   
                    <div class="mb-2">
                      <label for="kelas" class="form-label">Kelas</label>
                      <input type="text" readonly value="<?= $data_user["kelas"]; ?>" class="form-control" id="kelas" name="kelas">
                    </div>   
                    <div class="mb-2">
                      <button type="submit" class="btn btn-success" name="btn-simpan">Simpan</button>
                    </div>   
              </form>
          </div>

        <?php else: ?>
          <!-- Small boxes (Stat box) -->
          <div class="ro">
            <div class="col-lg-6">
                <div class="card" style="width: 18rem;">
                <img src="../img/profile/<?= $data_user["foto"]; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><b><?= $data_user["nama"]; ?></b></h5>
                  <p class="card-text">
                    Email : <?= $data_user["email"]; ?> <br>
                    Kelas : <?= $data_user["kelas"]; ?>
                  </p>
                  <a href="profil.php?editProfil" class="btn btn-primary">Edit</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
      <?php endif; ?>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include '../template/admin/footer.php' ?>