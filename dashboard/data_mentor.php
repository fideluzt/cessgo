<?php 
session_start();
include '../template/admin/head.php' ?>
<?php include '../template/admin/sidebar.php' ?>
<?php 

$data_bidang = getData("SELECT * FROM bidang_studi");
$bidang_studi = getData("SELECT * FROM bidang_studi");

// Tambah Mentor
if(isset($_POST["btn_tambah"])){
  if(tambahMentor($_POST) > 0){
      setFlash("Ditambahkan", "True", "Mentor");
      echo '<script>window.location="data_mentor.php";</script>';
    }else{
    setFlash("Ditambahkan", "False", "Mentor");
    echo '<script>window.location="data_mentor.php";</script>';
  }
}
?>

   <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahMentor">
                  <i class="fa-solid fa-circle-plus"></i> Tambah Mentor
                </button>
          </div>
        </div>
        <div class="row">
          <?php foreach($data_bidang as $bidang) : ?>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"> Data Mentor <b><?= $bidang["nama_bidang"]; ?></b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <table class="table table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $kelas = $bidang["nama_bidang"];
                      $data_mentor = getData("SELECT * FROM user WHERE level = 'mentor' AND kelas = '$kelas'");
                      foreach($data_mentor as $mentor) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $mentor["username"]; ?></td>
                          <td><?= $mentor["nama"]; ?></td>
                          <td><?= $mentor["kelas"]; ?></td>
                          <td><?= $mentor["email"]; ?></td>
                          <td>
                            <!-- <a href="#" class="badge badge-info">Lihat</a> -->
                            <a href="../proses_hapus.php?aksi=hapusPeserta&id=<?= $mentor["id"]; ?>" class="badge badge-danger hapusMahasiswa" data-konfirmasi="<?= $mentor["nama"]; ?>">Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          <?php endforeach; ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal Tambah Mentor-->
<div class="modal fade" id="tambahMentor" tabindex="-1" aria-labelledby="tambahMentorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahMentorLabel">Tambah Mentor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label for="npm_mentor" class="form-label">NPM Mentor</label>
            <input type="text" class="form-control" placeholder="Masukan NPM Mentor..." name="npm_mentor" id="npm_mentor" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="nama_mentor" class="form-label">Nama Mentor</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Mentor..." name="nama_mentor" id="nama_mentor" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas / Bidang Studi</label>
            <select class="form-select" id="kelas" name="kelas" aria-label="Default select example" required>
             <option value="">--Pilih Bidang--</option>
                 <?php foreach($bidang_studi as $bidang) : ?>
                      <option value="<?= $bidang["nama_bidang"]; ?>"><?= $bidang["nama_bidang"]; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="email_mentor" class="form-label">Email Mentor</label>
            <input type="email" class="form-control" placeholder="Masukan Email Mentor..." name="email_mentor" id="email_mentor" aria-describedby="emailHelp" required>
            <div id="email_mentor" class="form-text text-danger fw-bold">*Mohon isi dengan benar karena username dan password akan dikirim ke email</div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="btn_tambah" class="btn btn-primary">Tambah</button>
        </div>
      </div>
  </form>
  </div>
</div>
  </div>
  
<?php include '../template/admin/footer.php' ?>