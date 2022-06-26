<?php include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$jadwal_kelas = getData("SELECT * FROM jadwal");
$data_mentor = getData("SELECT * FROM user WHERE level = 'mentor'");
$bidang_studi = getData("SELECT * FROM bidang_studi");

// Tambah Mentor
if(isset($_POST["btn_tambah"])){
  if(tambahMentor($_POST) > 0){
      setFlash("Ditambahkan", "True", "Mentor");
      echo '<script>window.location="jadwal_admin.php";</script>';
    }else{
    setFlash("Ditambahkan", "False", "Mentor");
    echo '<script>window.location="jadwal_admin.php";</script>';
  }
}
// $nama_mentor = "Irpansyah";
// $npm_mentor = "062140720450";
// $email_mentor = "irpansyah810@gmail.com";
// $password = random_int(100000, 1000000);
// $pesan = "$password";
// $resp = notifikasi($nama_mentor, $email_mentor, "Mentor Password - CESSGO", $pesan );
// var_dump(json_decode($resp, true));
// die();
// $resp = json_decode($resp, true);
// if($resp["statusCode"] == 200){
//   setFlash("Dikirimkan", "True", "Email");
// }

 ?>



    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPrestasi">
          Tambah Data
        </button> -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Jadwal Pembelajaran CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="data_user" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Hari</th>
                      <th>Ruang</th>
                      <th>Kelas</th>
                      <th>Jam</th>
                      <th>Mentor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($jadwal_kelas as $jadwal) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $jadwal["hari"]; ?></td>
                        <td><?= $jadwal["ruang"]; ?></td>
                        <td><?= $jadwal["kelas"]; ?></td>
                        <td><?= $jadwal["waktu"]; ?></td>
                        <td><?= $jadwal["mentor"] === '' ? "-" : $jadwal["mentor"]; ?></td>
                        <td>
                            <a href="#" class="badge badge-info" data-bs-toggle="modal" data-bs-target="#jadwalKelas<?= $jadwal["id"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                            <div class="modal fade" id="jadwalKelas<?= $jadwal["id"]; ?>" tabindex="-1" aria-labelledby="editjadwalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="editJadwalLabel">Edit Jadwal Kelas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post">
                                        <div class="modal-body">
                                          <div class="mb-3">
                                            <label for="nama_jadwal" class="form-label">Hari</label>
                                            <input type="hidden" value="<?= $jadwal["id"]; ?>" name="id_jadwal">
                                            
                                          </div>
                                          <div class="mb-3">
                                            <label for="ruang" class="form-label">Ruang</label>
                                            <select class="form-select" id="ruang"  name="ruang" aria-label="Default select example" required>
                                              <option value="">--Pilih Ruang--</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 1" ? "selected" : "" ?> value="Ruang 1">Ruang 1</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 2" ? "selected" : "" ?> value="Ruang 2">Ruang 2</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 3" ? "selected" : "" ?> value="Ruang 3">Ruang 3</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 4" ? "selected" : "" ?> value="Ruang 4">Ruang 4</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 5" ? "selected" : "" ?> value="Ruang 5">Ruang 5</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 6" ? "selected" : "" ?> value="Ruang 6">Ruang 6</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="jenis_prestasi" class="form-label">Jenis Prestasi</label>
                                            <select class="form-select" aria-label="Default select example" name="jenis_prestasi" id="jenis_prestasi" required>
                                              <option value="">--Pilih Kelas--</option>
                                              <option <?= $jadwal["kelas"] == "Akademik" ? "selected" : "" ?> value="Akademik">Akademik</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="waktu" class="form-label">Waktu / Jam</label>
                                            <input type="text" class="form-control" name="waktu" id="waktu">
                                          </div>
                                          <div class="mb-3">
                                            <label for="mentor" class="form-label">Mentor</label>
                                            <input type="text" class="form-control" name="mentor" id="mentor">
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                          <button type="submit" name="btn_edit" class="btn btn-primary">Update</button>
                                        </div>
                                      </div>
                                  </form>
                                  </div>
                                </div>




                            <a href="../proses_hapus.php?aksi=hapusPrestasi&id=<?= $jadwal["id"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Jadwal Kelas <?= $jadwal["kelas"]; ?> "><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
                  </table>
                  </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Mentor CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                 <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahMentor">
                  <i class="fa-solid fa-circle-plus"></i> Tambah Mentor
                </button>
                <div class="table-responsive">
                  <table id="data_user" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Npm</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($data_mentor as $mentor) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mentor["username"]; ?></td>
                        <td><?= $mentor["nama"]; ?></td>
                        <td><?= $mentor["kelas"]; ?></td>
                        <td><?= $mentor["email"]; ?></td>
                        <td>
                            <a href="../proses_hapus.php?aksi=hapusMentor&id=<?= $mentor["id"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Mentor <?= $mentor["nama"]; ?> "><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    
                    </tbody>
                  </table>
                  </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
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
                 <?php foreach($bidang_studi as $studi) : ?>
                      <option value="<?= $studi["nama_bidang"] ?>"><?= $studi["nama_bidang"] ?></option>
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