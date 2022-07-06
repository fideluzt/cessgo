<?php include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$npm = $_SESSION["username"];
@$data_testimoni = getData("SELECT * FROM testimoni WHERE npm = '$npm'")[0];
if(@$data_testimoni["ket"] == "" || @$data_testimoni["ket"] == 1 || @$data_testimoni["ket"] == 2 ){
  $_SESSION["testimoni"] = true;
  // setFlashSistem("Silahkan Menunggu Testimoni Anda akan di proses", "success", "Terimakasih Sudah Mengirim Testimoni");
}
if(@$data_testimoni["ket"] == 3){
  unset($_SESSION["testimoni"]);
}

// Tambah Mentor
if(isset($_POST["btn_testimoni"])){
  // var_dump($_POST);
  // die();
  if(kirimTestimoni($_POST) > 0){
      setFlashSistem("Silahkan Menunggu Testimoni Anda akan di proses", "success", "Terimakasih Sudah Mengirim Testimoni");
      unset($_SESSION["testimoni"]);
      
    }else{
      setFlashSistem("Silahkan Mengirim Ulang.", "success", "Testimoni Gagal Dikirim");
  }
}
 ?>



    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPrestasi">
          Tambah Data
        </button> -->
        <div class="row">
          <div class="col-lg-10">
            <div class="card">
              <?= flashSistem(); ?>
              <div class="card-header">
                <h3 class="card-title"> <b>Hallo <?= $data_user[0]["nama"]; ?> Yuk Bagikan Testimonimu!!!</b></h3>
              </div>
          <?php if(isset($_SESSION["testimoni"])) : ?>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                                  <div class="mb-3">
                                    <label for="testimoni" class="form-label">Ceritakan Pengalamanmu?</label>
                                    <textarea name="testimoni" class="form-control" id="testimoni" placeholder="Ceritakan Pengalamanmu..." maxlength="150" cols="30" rows="6"></textarea>
                                    <div class="form-text text-danger">*Maksimal Karakter : 150</div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="gambar" class="form-label">Upload Foto</label>
                                    <input type="file" required class="form-control" name="gambar" id="gambar" >
                                    <input type="hidden" value="<?= $data_user[0]["nama"]; ?>" name="nama" >
                                    <input type="hidden" value="<?= $data_user[0]["username"]; ?>" name="npm">
                                    <input type="hidden" value="<?= "Peserta ". $data_user[0]["kelas"]; ?>" name="title" >
                                  </div>
                                <div class="mb-3">
                                  <button type="submit" class="btn btn-success" name="btn_testimoni">Kirim</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                  </form>
                </div>
                <?php endif; ?>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include '../template/admin/footer.php' ?>